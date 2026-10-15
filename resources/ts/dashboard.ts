declare const Swal: typeof import('sweetalert2').default;
import type { ApexOptions } from 'apexcharts';

declare const ApexCharts: {
    new (element: HTMLElement, options: ApexOptions): {
        render(): Promise<void>;
    };
};

interface DashboardConfig {
    showDraftModal?: boolean;
    showValidationModal: boolean;
    showApprovalModal: boolean;
    stockChartUrl: string;
    beneficiaryChartUrl: string;
    inboundShowBaseUrl: string;
}

interface StockRecord {
    month: number | string;
    total: number | string;
    entry_type?: string;
    output_type?: string;
}

interface DashboardStockData {
    entries: StockRecord[];
    outputs: StockRecord[];
}

interface BeneficiaryData {
    male: number[];
    female: number[];
    labels: string[];
}

interface StockSeries {
    name: string;
    color: string;
    data: number[];
}

interface ApiError {
    status: number;
    responseJSON?: {
        message?: string;
    };
}

function getDashboardConfig(): DashboardConfig {
    const element = document.getElementById('dashboard-config');

    if (!element?.textContent) {
        throw new Error('Configuração do dashboard não encontrada.');
    }

    return JSON.parse(element.textContent) as DashboardConfig;
}

function translateExportMenus(container: string): void {
    const translations: Record<string, string> = {
        'Download SVG': '📥 SVG',
        'Download PNG': '📥 PNG',
        'Download CSV': '📥 CSV'
    };

    document.querySelectorAll(`${container} .apexcharts-menu-item`)
        .forEach((item) => {
            const text = item.textContent?.trim();

            if (text && translations[text]) {
                item.textContent = translations[text];
            }
        });
}

function buildSeries(
    types: string[],
    source: StockRecord[],
    labels: Record<string, string>,
    colors: string[],
    typeKey: 'entry_type' | 'output_type'
): StockSeries[] {
    const months = Array.from({ length: 12 }, (_, i) => i + 1);

    return types.map((type, index) => ({
        name: labels[type],
        color: colors[index],
        data: months.map((month) => {
            const record = source.find((item) =>
                Number(item.month) === month &&
                item[typeKey] === type
            );

            return record ? Number(record.total) : 0;
        })
    }));
}

function loadStockCharts(config: DashboardConfig): void {
    const entryLabels: Record<string, string> = {
        buy: 'Public Purchase',
        donation: 'External Donation',
        transfer: 'Warehouse Transfer'
    };

    const outputLabels: Record<string, string> = {
        distribution: 'Distribution to Beneficiaries',
        institution_donation: 'Donation to Institutions',
        internal_transfer: 'Internal Transfer'
    };

    const months = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    $.getJSON(config.stockChartUrl, (data: DashboardStockData) => {
        const entryColors = ['#00E396', '#0090FF', '#775DD0'];
        const outputColors = ['#FF4560', '#FEB019', '#546E7A'];

        const commonOptions: ApexOptions = {
            chart: {
                type: 'bar',
                height: 350,
                stacked: false,
                toolbar: { show: true },
                zoom: { enabled: true }
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '80%',
                    borderRadius: 5
                }
            },
            dataLabels: { enabled: false },
            xaxis: { categories: months },
            legend: { position: 'bottom' },
            fill: { opacity: 1 },
            tooltip: {
                shared: true,
                intersect: false
            }
        };

        const entryElement = document.querySelector<HTMLElement>('#entriesChart');

        if (entryElement) {
            const entryChart = new ApexCharts(entryElement, {
                ...commonOptions,
                series: buildSeries(
                    ['buy', 'donation', 'transfer'],
                    data.entries,
                    entryLabels,
                    entryColors,
                    'entry_type'
                )
            });

            entryChart.render().then(() => {
                setTimeout(() => translateExportMenus('#entriesChart'), 500);
            });
        }

        const outputElement = document.querySelector<HTMLElement>('#outputsChart');

        if (outputElement) {
            const outputChart = new ApexCharts(outputElement, {
                ...commonOptions,
                series: buildSeries(
                    ['distribution', 'institution_donation', 'internal_transfer'],
                    data.outputs,
                    outputLabels,
                    outputColors,
                    'output_type'
                )
            });

            outputChart.render().then(() => {
                setTimeout(() => translateExportMenus('#outputsChart'), 500);
            });
        }
    }).fail((error: JQuery.jqXHR) => {
        console.error('Error loading stock charts:', error);
    });
}

function loadBeneficiaryChart(config: DashboardConfig): void {
    $.ajax({
        url: config.beneficiaryChartUrl,
        method: 'GET',
        dataType: 'json',

        success: (data: BeneficiaryData) => {
            const element = document.querySelector<HTMLElement>('#beneficiaryChart');

            if (!element) {
                return;
            }

            const options: ApexOptions = {
                series: [
                    { name: 'Male', data: data.male },
                    { name: 'Female', data: data.female }
                ],

                chart: {
                    type: 'bar',
                    height: 350,
                    stacked: false,
                    toolbar: {
                        show: true,
                        offsetX: 0,
                        offsetY: 0,
                        tools: {
                            download: true,
                            selection: true,
                            zoom: true,
                            zoomin: true,
                            zoomout: true,
                            pan: true,
                            reset: true
                        },
                        export: {
                            csv: {
                                filename: 'beneficiaries_by_gender_age',
                                headerCategory: 'Age Group',
                                headerValue: 'Número'
                            },
                            svg: {
                                filename: 'beneficiaries_by_gender_age'
                            },
                            png: {
                                filename: 'beneficiaries_by_gender_age'
                            }
                        }
                    }
                },

                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '40%',
                        dataLabels: { position: 'top' },
                        borderRadiusApplication: 'end',
                        borderRadius: 6
                    }
                },

                dataLabels: {
                    enabled: true,
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ['#304758']
                    }
                },

                stroke: {
                    show: false,
                    colors: ['transparent'],
                    width: 2
                },

                xaxis: {
                    categories: data.labels,
                    title: { text: 'Age Group' }
                },

                yaxis: {
                    title: { text: 'Number of Beneficiaries' },
                    labels: {
                        formatter: (value: number) => String(parseInt(String(value), 10))
                    }
                },

                fill: { opacity: 0.8 },

                legend: {
                    offsetY: 10,
                    position: 'bottom',
                    horizontalAlign: 'center',
                    fontSize: '14px',
                    markers: {
                        size: 2
                    },
                    itemMargin: { horizontal: 15 }
                },

                tooltip: {
                    y: {
                        formatter: (value: number) => `${value} beneficiaries`
                    }
                }
            };

            const chart = new ApexCharts(element, options);

            chart.render().then(() => {
                setTimeout(() => {
                    translateExportMenus('#beneficiaryChart');
                }, 500);
            });
        },

        error: (error: JQuery.jqXHR) => {
            console.error('Error loading the beneficiaries chart:', error);
        }
    });
}

$(document).ready(() => {
    const config = getDashboardConfig();

    if (config.showDraftModal) {
        $('#draftEvent').modal('show');
    } else if (config.showValidationModal) {
        $('#validationEvent').modal('show');
    } else if (config.showApprovalModal) {
        $('#approvalEvent').modal('show');
    }

    $(document).on('click', '.view-details', function (this: HTMLElement) {
        const id: string | number | undefined = $(this).data('id');

        if (!id) {
            return;
        }

        Swal.fire({
            title: 'Processing...',
            text: 'Please wait.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: `${config.inboundShowBaseUrl}/${encodeURIComponent(String(id))}`,
            method: 'GET',

            success: (response: { html: string }) => {
                Swal.close();
                $('#detailsContent').html(response.html);
                $('#detailsModal').modal('show');
            },

            error: (xhr: ApiError) => {
                Swal.close();

                let message = 'Unable to load details.';

                if (xhr.status === 404) {
                    message = 'Details not found.';
                } else if (xhr.responseJSON?.message) {
                    message = xhr.responseJSON.message;
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: message
                });
            }
        });
    });

    if (
        document.querySelector('#entriesChart') ||
        document.querySelector('#outputsChart')
    ) {
        loadStockCharts(config);
    }

    if (document.querySelector('#beneficiaryChart')) {
        loadBeneficiaryChart(config);
    }
});