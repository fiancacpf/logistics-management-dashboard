<style>
    #detailsModal .table {
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    #detailsModal .table th,
    #detailsModal .table td {
        padding: 10px;
        text-align: left;
    }

    #detailsModal .table th {
        background-color: #f1f1f1;
        color: #333;
        font-weight: bold;
    }
    #detailsModal .table.draft th {
        background-color: #dc3545;
        color: white;
    }
    #detailsModal .table.in_validation th {
        background-color: #ffc107;
    }
    #detailsModal .table.in_approval th {
        background-color: #0dcaf0;
    }
    #detailsModal .table.completed th {
        background-color: #198754;
        color: white;
    }

    .timeline-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        margin-top: 30px;
        position: relative;
    }

    .timeline-container::before {
        content: '';
        position: absolute;
        width: 4px;
        background-color: #e9ecef;
        top: 0;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
        z-index: 0;
    }

    .timeline-item {
        position: relative;
        width: 100%;
        margin-bottom: 50px;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-item-inner {
        display: flex;
        width: 100%;
    }

    .timeline-item.right .timeline-item-inner {
        justify-content: flex-end;
    }

    .timeline-content {
        width: 45%; 
        padding: 20px 25px;
        background-color: #ffffff;
        position: relative;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-left: 5px solid transparent; 
        z-index: 1;
    }

    .timeline-item.right .timeline-content {
        border-left: none;
        border-right: 5px solid transparent;
    }

    .timeline-content h6 {
        margin-bottom: 8px;
        font-weight: bold;
        color: #343a40;
    }

    .timeline-content p {
        font-size: 0.9em;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .timeline-content .history-detail-item {
        font-size: 1.1em;
        color: #495057;
        margin-top: 5px;
        padding-left: 10px;
        border-left: 2px solid #e9ecef;
    }

    .timeline-content .history-detail-item strong {
        color: #212529;
    }

    .timeline-item .timeline-dot {
        position: absolute;
        width: 20px;
        height: 20px;
        background-color: #adb5bd;
        border: 4px solid #f8f9fa;
        border-radius: 50%;
        top: 25px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
    }

    .timeline-item.left .timeline-content::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 4px;
        background-color: #e9ecef;
        top: 35px;
        right: -40px;
        z-index: 0;
    }

    .timeline-item.left .timeline-content::before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-left: 8px solid #e9ecef;
        top: 29px;
        right: -48px;
        z-index: 0;
    }

    .timeline-item.right .timeline-content::after {
        content: '';
        position: absolute;
        width: 40px;
        height: 4px;
        background-color: #e9ecef;
        top: 35px;
        left: -40px;
        z-index: 0;
    }

    .timeline-item.right .timeline-content::before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        border-top: 8px solid transparent;
        border-bottom: 8px solid transparent;
        border-right: 8px solid #e9ecef;
        top: 29px;
        left: -48px;
        z-index: 0;
    }

    .timeline-content.draft {
        background-color: #ffe0e0;
        border-color: #dc3545;
    }
    .timeline-item.right .timeline-content.draft {
        border-right-color: #dc3545;
    }

    .timeline-content.in_validation {
        background-color: #fff3cd;
        border-color: #ffc107;
    }
    .timeline-item.right .timeline-content.in_validation {
        border-right-color: #ffc107;
    }

    .timeline-content.in_approval {
        background-color: #e0f7fa;
        border-color: #0dcaf0;
    }
    .timeline-item.right .timeline-content.in_approval {
        border-right-color: #0dcaf0;
    }

    .timeline-content.completed {
        background-color: #d4edda;
        border-color: #198754;
    }
    .timeline-item.right .timeline-content.completed {
        border-right-color: #198754;
    }

    .timeline-item.active .timeline-dot {
        background-color: #007bff;
        border-color: #f8f9fa;
    }

    @media (max-width: 768px) {
        .timeline-container::before {
            left: 20px;
            transform: translateX(0);
        }
        .timeline-item {
            width: 100%;
            margin-bottom: 20px;
        }
        .timeline-item-inner {
            flex-direction: column;
            align-items: flex-start;
        }
        .timeline-item.right .timeline-item-inner {
            justify-content: flex-start;
        }
        .timeline-content {
            width: calc(100% - 50px);
            margin-left: 50px;
            border-right: none !important;
            border-left: 5px solid transparent !important;
        }
        
        .timeline-item .timeline-content::after,
        .timeline-item .timeline-content::before {
            display: none;
        }
        .timeline-item .timeline-dot {
            left: 20px;
            transform: translateX(-50%);
        }
    }
</style>

<div id="detailsEntry">
    <div class="d-flex justify-content-end flex-wrap gap-2 mb-3">
        <button class="btn btn-primary btn-sm" onclick="$('#detailsEntry').hide();$('#stageHistory').show()">History of the Stages</button>
    </div>
    <p><strong>Person in Charge:</strong> {{ $entry->user->name ?? '-' }}</p>
    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($entry->entry_date)->format('d-m-Y') }}</p>
    <p><strong>Warehouse:</strong> {{ $entry->warehouse->name ?? '-' }}</p>
    <p><strong>Supplier:</strong> {{ $entry->supplier->name ?? '-' }}</p>
    <p><strong>Entry Type:</strong>
    @php
        $type = match ($entry->entry_type) {
            'buy' => 'Public Procurement',
            'donation' => 'External Donation',
            'transfer' => 'Warehouse Transfer',
            'other' => 'Third Parties',
            default => $entry->entry_type,
        };
    @endphp
    {{$type}}
    </p>
    <p><strong>Quantity: </strong>
        @php
            $count = $entry->items->unique('product_id')->count();
            echo number_format($count, 0, ',', '.') . ' ' . ($count <= 1 ? 'product' : 'products');
        @endphp
    </p>
    <p><strong>Remarks: </strong> {{ $entry->notes ?? '-' }}</p>
    <p><strong>Document: </strong>
        @if($entry->document_path && Storage::disk('public')->exists($entry->document_path))
            <a href="{{ asset('storage/' . $entry->document_path) }}" class="btn btn-sm btn-primary" target="_blank">Open Document</a>
        @else
            --
        @endif
    </p>
    <p>
        <strong>Status: </strong>
        @if ($entry->status == 'draft')
            <span class="badge bg-danger">Draft</span>
        @elseif ($entry->status == 'in_validation')
            <span class="badge bg-warning">In Validation</span>
        @elseif ($entry->status == 'in_approval')
            <span class="badge bg-info">In Approval</span>
        @elseif ($entry->status == 'completed')
            <span class="badge bg-success">Completed</span>
        @endif
    </p>
    @if ($entry->status != 'draft')
    <p><strong>Validation Document: </strong>
        @if($entry->validation_document && Storage::disk('public')->exists($entry->validation_document))
            <a href="{{ asset('storage/' . $entry->validation_document) }}" class="btn btn-sm btn-warning" target="_blank">Open Document</a>
        @else
            --
        @endif
    </p>
    @endif
    @if ($entry->status != 'draft' && $entry->status != 'in_validation')
    <p><strong>Approval Notes:</strong> {{ $entry->approve_notes ?? '-' }}</p>
    @endif
    @if ($entry->status == 'completed')
    <p><strong>Finalization Notes:</strong> {{ $entry->complete_notes ?? '-' }}</p>
    @endif

    <h5>Products:</h5>
    <table class="table table-sm table-bordered {{$entry->status}}">
        <thead>
            <tr>
                <th>Product</th>
                <th>Brand</th>
                <th>Quantity</th>
                <th>Condition</th>
                <th>Batch</th>
                <th>Expiry Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entry->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->product->description }}</td>
                    <td>{{ number_format($item->quantity, 2, ',', '.').' '.$item->product->unit->base_unit }}</td>
                    <td>{{ $item->state->translated_name ?? '-' }}</td>
                    <td>{{ $item->batch_number ?? '-' }}</td>
                    <td>{{ $item->expiration_date ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="stageHistory" style="display: none;">
    <div class="d-flex justify-content-between flex-wrap gap-2">
        <h5 class="mt-4"></h5>

        <button class="btn btn-secondary btn-sm" onclick="$('#detailsEntry').show();$('#stageHistory').hide()">Go back</button>
    </div>
    
    <div class="timeline-container">
        @php
            $actionTitles = [
                'create' => 'Entry Creation',
                'validate_arrival' => 'Arrival Validation',
                'reject_validation' => 'Validation Rejection',
                'approve_validation' => 'Validation Approval',
                'reject_approval' => 'Approval Rejection',
                'complete' => 'Entry Completion',
                'reject_completion' => 'Completion Rejection',
            ];
    
            $actionStatusClass = [
                'create' => 'draft',
                'validate_arrival' => 'in_validation',
                'reject_validation' => 'in_validation',
                'approve_validation' => 'in_approval',
                'reject_approval' => 'in_approval',
                'complete' => 'completed',
                'reject_completion' => 'completed',
            ];
    
            $counter = 0;
            $sortedStageHistories = $entry->stageHistories ?? collect();
            $sortedStageHistories = $sortedStageHistories->sortBy('created_at');
        @endphp
    
        @foreach ($sortedStageHistories as $history)
            @php
                $historyAction = $history->action ?? 'unknown';
                $itemClass = ($counter % 2 == 0) ? 'left' : 'right';
                $statusCode = $actionStatusClass[$historyAction] ?? 'unknown';
                $counter++;
            @endphp
            <div class="timeline-item {{ $itemClass }}">
                <div class="timeline-item-inner">
                    <div class="timeline-content {{ $statusCode }}">
                        <h6>{{ $actionTitles[$historyAction] ?? ucfirst(str_replace('_', ' ', $historyAction)) }}</h6>
                        <div class="history-detail-item">
                            <p><strong>Action:</strong>
                                @switch($historyAction)
                                    @case('create') Entry Created @break
                                    @case('validate_arrival') Arrival Validated @break
                                    @case('reject_validation') Validation Rejected @break
                                    @case('approve_validation') Validation Approved @break
                                    @case('reject_approval') Approval Rejected @break
                                    @case('complete') Entry Completed @break
                                    @case('reject_completion') Completion Rejected @break
                                    @default {{ ucfirst(str_replace('_', ' ', $historyAction)) }} @break
                                @endswitch
                            </p>
                            @if($history->notes)
                                <p><strong>Notes:</strong> {{ $history->notes }}</p>
                            @endif
                            <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($history->created_at)->format('d-m-Y H:i') }}</p>
                            @if($history->user)
                                <p><strong>By:</strong> {{ $history->user->name }}</p>
                            @endif
                            @if($history->path)
                                <p><strong>Document:</strong> <a href="{{ asset('storage/' . $history->path) }}" target="_blank" class="btn btn-sm btn-outline-secondary">Open</a></p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="timeline-dot"></div>
            </div>
        @endforeach
    
        @php
            $lastHistoryActionStatus = null;
            if ($sortedStageHistories->isNotEmpty()) {
                $lastHistory = $sortedStageHistories->last();
                if ($lastHistory && $lastHistory->action) {
                    $lastHistoryActionStatus = $actionStatusClass[$lastHistory->action] ?? null;
                }
            }
        @endphp
        @if ($sortedStageHistories->isEmpty() || $entry->status != $lastHistoryActionStatus)
            @php
                $itemClass = ($counter % 2 == 0) ? 'left' : 'right';
                $statusCode = $entry->status;
            @endphp
            <div class="timeline-item {{ $itemClass }} active">
                <div class="timeline-item-inner">
                    <div class="timeline-content {{ $statusCode }}">
                        <h6>Current State:
                            @if ($entry->status == 'draft') Draft
                            @elseif ($entry->status == 'in_validation') In Validation
                            @elseif ($entry->status == 'in_approval') In Approval
                            @elseif ($entry->status == 'completed') Completed
                            @endif
                        </h6>
                        <p>This is the current status of the entry.</p>
                    </div>
                </div>
                <div class="timeline-dot active"></div>
            </div>
        @endif
    </div>
</div>