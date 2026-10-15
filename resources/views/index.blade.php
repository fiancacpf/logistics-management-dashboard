@extends('layouts.master')

@section('title') Dashboard @endsection

@section('content')

@component('components.breadcrumb')
@slot('li_1') {{ Auth::user()->access->name }} @endslot
@slot('title') Dashboard @endslot
@endcomponent

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Risk Alerts</h4>
                <ul class="verti-timeline list-unstyled">
                    <li class="event-list">
                        <div class="event-timeline-dot rounded-circle bg-danger d-flex justify-content-center align-items-center
                        {{$total_cleaning > 0 ? 'bx-fade-right': ''}}" style="width: 24px; height: 24px;">
                            <i class="mdi mdi-package-variant-closed font-size-18 text-white"></i>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <h5 class="font-size-14">&nbsp;&nbsp;{{ number_format($total_cleaning, 0, ',', '.') }} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                            </div>
                            <div class="flex-grow-1">
                                <div>Products <br> <a class="text-secondary">nearing expiration</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="event-list">
                        <div class="event-timeline-dot rounded-circle bg-warning d-flex justify-content-center align-items-center
                        {{$stock_by_warehouse > 0 ? 'bx-fade-right': ''}}" style="width: 24px; height: 24px;">
                            <i class="mdi mdi-package-variant-closed font-size-18 text-white"></i>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <h5 class="font-size-14">&nbsp;&nbsp;{{ number_format($stock_by_warehouse, 0, ',', '.') }} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                            </div>
                            <div class="flex-grow-1">
                                <div>Products <br> <a class="text-secondary">below stock level</a></div>
                            </div>
                        </div>
                    </li>
                    <li class="event-list">
                        <div class="event-timeline-dot rounded-circle bg-secondary d-flex justify-content-center align-items-center
                        {{$crowded_warehouses > 0 ? 'bx-fade-right': ''}}" style="width: 24px; height: 24px;">
                            <i class="mdi mdi-store font-size-18 text-white"></i>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <h5 class="font-size-14">&nbsp;&nbsp;{{ number_format($crowded_warehouses, 0, ',', '.') }} <i class="bx bx-right-arrow-alt font-size-16 text-primary align-middle ms-2"></i></h5>
                            </div>
                            <div class="flex-grow-1">
                                <div><a class="text-secondary">Warehouses at risk</a></div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Transactions</h4>
                <div class="text-center">
                    <div class="avatar-sm mx-auto mb-4">
                        <span class="avatar-title rounded-circle bg-primary-subtle font-size-24">
                            <i class="bx bx-transfer text-primary"></i>

                        </span>
                    </div>
                    <p class="font-16 text-muted mb-2"></p>
                    <h5>
                        <a href="javascript: void(0);" class="text-dark">Total Transactions <br><br>
                            <span class="text-muted font-16 fs-3">
                                {{ number_format($total_stock_entries + $total_stock_output + $total_cleaning, 0, ',', '.') }}
                            </span>
                        </a>
                    </h5>
                    <br>
                    <p class="text-muted">Summary of Transactions</p>
                </div>
                <div class="row mt-4">
                    <div class="col-4">
                    <a href="javascript: void(0);">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span class="avatar-title rounded-circle bg-primary font-size-16">
                                    <i class="fas fa-arrow-alt-circle-up text-white"></i>
                                </span>
                            </div>
                            <h5 class="font-size-15 text-muted">Entries</h5>
                            <p class="text-muted mb-0">
                                {{ number_format($total_stock_entries, 0, ',', '.') }}
                            </p>
                        </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="javascript: void(0);">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span class="avatar-title rounded-circle bg-info font-size-16">
                                    <i class="fas fa-minus-circle text-white"></i>
                                </span>
                            </div>
                            <h5 class="font-size-15 text-muted">Outputs</h5>
                            <p class="text-muted mb-0">
                                {{ number_format($total_stock_output, 0, ',', '.') }}
                            </p>
                        </div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="javascript: void(0);">
                        <div class="social-source text-center mt-3">
                            <div class="avatar-xs mx-auto mb-3">
                                <span class="avatar-title rounded-circle bg-pink font-size-16">
                                    <i class="fas fa-broom text-white"></i>
                                </span>
                            </div>
                            <h5 class="font-size-15 text-muted">Clearances</h5>
                            <p class="text-muted mb-0">{{ number_format($total_cleaning, 0, ',', '.') }} </p>
                        </div>
                    </a>
                    </div>
                </div>
                <span style="display: block; height: 28px;"></span>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Total <br>Stock</p>
                                <h4 class="mb-0">{{ number_format(count($stock), 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-info">
                                    <span class="avatar-title bg-info">
                                        <i class="bx bx-package font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Stock <br>Entries</p>
                                <h4 class="mb-0">{{ number_format($total_stock_entries, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-success mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-success">
                                        <i class="bx bx-log-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @if(Auth::user()->access_profile_id == 3)
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Entries <br>In Validation</p>
                                <h4 class="mb-0">{{ number_format($total_stock_entries_in_validation, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-warning">
                                        <i class="bx bx-log-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @elseif(Auth::user()->access_profile_id == 2)
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Entries <br>In Approval</p>
                                <h4 class="mb-0">{{ number_format($total_stock_entries_in_approval, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-warning">
                                        <i class="bx bx-log-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @else
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Entries <br>Queue</p>
                                <h4 class="mb-0">{{ number_format($total_stock_entries_in_line, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-warning mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-warning">
                                        <i class="bx bx-log-in font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endif
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">
                                    Clearances <br>...
                                </p>
                                <h4 class="mb-0">{{ number_format($total_cleaning, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon pulse-animation">
                                    <span class="avatar-title rounded-circle bg-danger">
                                        <i class="bx bx-trash font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Stock <br>Outputs</p>
                                <h4 class="mb-0">{{ number_format($total_stock_output, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="avatar-sm rounded-circle bg-primary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-primary">
                                        <i class="bx bx-log-out	 font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @if(Auth::user()->access_profile_id == 3)
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Outputs <br>Pending</p>
                                <h4 class="mb-0">{{ number_format($total_stock_output_pending, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-secondary">
                                        <i class="bx bx-log-out font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @elseif(Auth::user()->access_profile_id == 2)
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Outputs <br>Validated</p>
                                <h4 class="mb-0">{{ number_format($total_stock_output_validated, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-secondary">
                                        <i class="bx bx-log-out font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @else
            <div class="col-md-4">
                <a href="javascript: void(0);">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Outputs <br>Queue</p>
                                <h4 class="mb-0">{{ number_format($total_stock_output_in_line, 0, ',', '.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center ">
                                <div class="avatar-sm rounded-circle bg-secondary mini-stat-icon">
                                    <span class="avatar-title rounded-circle bg-secondary">
                                        <i class="bx bx-log-out font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Entries Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="entriesChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Outputs Chart</h4>
                    </div>
                    <div class="card-body">
                        <div id="outputsChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body" style="min-height: 447px;">
                <h4 class="card-title mb-4">Beneficiaries by Gender and Age Group</h4>
                <div id="beneficiaryChart"></div>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card">
            <div class="card-body" style="min-height: 447px;">
                <h4 class="card-title mb-4">Beneficiaries by Province</h4>

                <div class="text-center">
                    <div class="mb-4">
                        <i class="bx bx-map-pin text-primary display-4"></i>
                    </div>
                    <h3>{{ number_format(optional($topProvince)->total ?? 0, 0, ',', '.') }}</h3>
                    <p>{{ $topProvinceName }}</p> <!-- Mostra o nome da província -->
                </div>

                <div class="table-responsive mt-4">
                    <table class="table align-middle table-nowrap">
                        <tbody>
                            @foreach($beneficiariesByProvince as $province)
                                @php
                                    $percentage = ($province->total / $topProvince->total) * 100;
                                    $color = match($loop->index) {
                                        0 => 'primary',
                                        1 => 'success',
                                        2 => 'warning',
                                        default => 'secondary'
                                    };
                                @endphp
                                <tr title="{{ $province->province_name }}">
                                    <td style="width: 40%;" class="truncate-cell">
                                        <p class="mb-0">{{ $province->province_name }}</p>
                                    </td>
                                    <td style="width: 25%">
                                        <h5 class="mb-0">{{ number_format($province->total, 0, ',', '.') }}</h5>
                                    </td>
                                    <td>
                                        <div class="progress bg-transparent progress-sm">
                                            <div class="progress-bar bg-{{ $color }} rounded" role="progressbar"
                                                style="width: {{ min(100, round($percentage)) }}%"
                                                aria-valuenow="{{ round($percentage) }}" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .truncate-cell {
        max-width: 1px;
        & p{
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    }
</style>

@php
    use Illuminate\Support\Facades\Storage;
@endphp


<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Latest Entries</h4>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="align-middle">ID</th>
                                <th class="align-middle">Date</th>
                                <th class="align-middle">Warehouse</th>
                                <th class="align-middle">Supplier</th>
                                <th class="align-middle">Type</th>
                                <th class="align-middle">QTD</th>
                                <th class="align-middle">View details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stock_entries as $item)
                            @php
                                $count = $item->items->unique('product_id')->count();
                            @endphp
                            <tr>
                                <td><a href="javascript: void(0);" class="text-body fw-bold">{{ 'MFE' . str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</a> </td>
                                <td>{{ $item->entry_date }}</td>
                                <td>{{ $item->warehouse->name }}</td>
                                <td>{{ $item->supplier->name }}</td>
                                <td>
                                    @php
                                        if ($item->entry_type == 'donation')
                                            echo '<i class="fas fa-gift me-1" title="'.$item->entry_type_label.'"></i>';
                                        elseif ($item->entry_type == 'buy')
                                            echo '<i class="fas fa-shopping-bag me-1" title="'.$item->entry_type_label.'"></i>';
                                        elseif ($item->entry_type == 'other')
                                            echo '<i class="fas fa-hand-holding me-1" title="'.$item->entry_type_label.'"></i>';
                                        else
                                            echo '<i class="fas fa-exchange-alt me-1" title="'.$item->entry_type_label.'"></i>';
                                    @endphp
                                </td>
                                <td>{{ $count . ' ' . ($count === 1 ? 'produto' : 'produtos') }}</td>
                                <td>
                                    <button class="btn btn-info btn-sm view-details" data-id="{{ $item->id }}">Details</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">Entry Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div id="detailsContent"></div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

<script type="application/json" id="dashboard-config">
{!! json_encode([
    'showValidationModal' => (
        Auth::user()->access_profile_id == 3 &&
        ($total_stock_entries_in_validation > 0 ||
         $total_stock_output_pending > 0)
    ),
    'showApprovalModal' => (
        Auth::user()->access_profile_id == 2 &&
        ($total_stock_entries_in_approval > 0 ||
         $total_stock_output_validated > 0)
    ),
    'stockChartUrl' => url('/stock-chart-data'),
    'beneficiaryChartUrl' => route('beneficiaries.chartData'),
    'inboundShowBaseUrl' => url('/inbounds-show')
], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) !!}
</script>

@vite('resources/ts/dashboard.ts')

@endsection