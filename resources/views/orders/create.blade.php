@extends('layout.layout')

@section('content')
<div class="content-wrapper" style="padding:20px;">
    <div class="content-header">
        <div class="container-fluid">
            <h1>Create Order</h1>
        </div>
    </div>

    <section class="content" style="background-color:#fff;padding:20px;">
    <div class="order-form-header">
                    <h2>Bill No. : ORD-674BF</h2>
                    <div class="date-time">
                        <div>Date: <span id="currentDate"></span></div>
                        <div>Time: <span id="currentTime"></span></div>
                    </div>
                </div>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="table">Table</label>
                <select name="table" id="table" class="form-control" required>
                    <option value="" disabled selected>Select Table</option>
                    @foreach($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->table_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="product-section">
                <table id="product-table" class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="products[0][product_id]" class="form-control product-select" required>
                                    <option value="" disabled selected>Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="number" name="products[0][qty]" class="form-control qty-input" min="1" value="1" required></td>
                            <td><input type="text" name="products[0][rate]" class="form-control rate-input" value="20" readonly></td>
                            <td><input type="text" name="products[0][amount]" class="form-control amount-input" readonly></td>
                            <td>
                                <button type="button" class="btn btn-success add-row-btn">+</button>
                                <button type="button" class="btn btn-danger remove-row-btn">x</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="summary-section">
                <label>Gross Amount</label>
                <input type="text" name="gross_amount" id="gross-amount" class="form-control" readonly>
                <label>Service Charge (10%)</label>
                <input type="text" name="service_charge_amount" id="service-charge-amount" class="form-control" readonly>
                <label>VAT (15%)</label>
                <input type="text" name="vat_charge_amount" id="vat-charge-amount" class="form-control" readonly>
                <label>Discount</label>
                <input type="number" name="discount" id="discount" class="form-control" min="0">
                <label>Net Amount</label>
                <input type="text" name="net_amount" id="net-amount" class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="paid_status">Payment Status</label>
                <select name="paid_status" class="form-control">
                        <option value="0">Not Paid</option>
                        <option value="1">Paid</option>
                    </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </section>
</div>

<style>
    /* Input Field ReadOnly */
    input[readonly] {
        background-color: #f0f0f0; /* Light grey background */
        color: #666;               /* Dark grey text color */
        cursor: not-allowed;       /* Show a not-allowed cursor */
        border: 1px solid #ccc;
    }

    .breadcrumbs {
    font-size: 14px;
}

.breadcrumbs a {
    color: #3498db;
    text-decoration: none;
}

.breadcrumbs span {
    color: #666;
}

.order-form {
    background-color: white;
    border: 1px solid #d9e2e8;
    padding: 20px;
    margin-top: 20px;
    border-radius: 5px;
}

.order-form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.date-time {
    font-size: 14px;
    color: #666;
}

.table-selection,
.product-selection,
.amount-summary,
.action-buttons {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table thead {
    background-color: #f4f7f9;
}

table th,
table td {
    border: 1px solid #d9e2e8;
    padding: 10px;
    text-align: left;
}

.product-dropdown,
.quantity,
.rate,
.amount,
.gross-amount,
.vat-amount,
.discount,
.net-amount {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

.add-btn,
.remove-btn {
    padding: 5px 10px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.remove-btn {
    background-color: #e74c3c;
}

.action-buttons {
    display: flex;
    justify-content: space-between;
}

.create-order-btn {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.back-btn {
    background-color: #f39c12;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

@media (max-width: 768px) {
    .order-form {
        padding: 15px;
    }

    .order-form-header {
        flex-direction: column;
        align-items: flex-start;
    }

    .date-time {
        margin-top: 10px;
    }

    table th,
    table td {
        padding: 8px;
    }

    .create-order-btn,
    .back-btn {
        width: 100%;
        margin-bottom: 10px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const productTable = document.querySelector('#product-table tbody');
    const grossAmountField = document.getElementById('gross-amount');
    const serviceChargeAmountField = document.getElementById('service-charge-amount');
    const vatChargeAmountField = document.getElementById('vat-charge-amount');
    const netAmountField = document.getElementById('net-amount');
    const discountField = document.getElementById('discount');
    const dateElement = document.getElementById('currentDate');
    const timeElement = document.getElementById('currentTime');

    const currentDate = new Date();
        dateElement.textContent = currentDate.toISOString().split('T')[0];
        timeElement.textContent = currentDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

    function calculateAmounts() {
        let grossAmount = 0;
        productTable.querySelectorAll('tr').forEach(row => {
            const qty = row.querySelector('.qty-input').value || 0;
            const rate = row.querySelector('.rate-input').value || 20;
            const amountField = row.querySelector('.amount-input');
            const amount = qty * rate;
            amountField.value = amount.toFixed(2);
            grossAmount += amount;
        });
        grossAmountField.value = grossAmount.toFixed(2);
        const serviceCharge = (10 / 100) * grossAmount;
        serviceChargeAmountField.value = serviceCharge.toFixed(2);
        const vatCharge = (15 / 100) * grossAmount;
        vatChargeAmountField.value = vatCharge.toFixed(2);
        const discount = discountField.value || 0;
        const netAmount = grossAmount + serviceCharge + vatCharge - discount;
        netAmountField.value = netAmount.toFixed(2);
    }

    productTable.addEventListener('change', calculateAmounts);
    discountField.addEventListener('input', calculateAmounts);

    productTable.addEventListener('click', function (event) {
        if (event.target.classList.contains('add-row-btn')) {
            const newRow = productTable.querySelector('tr').cloneNode(true);
            newRow.querySelectorAll('input, select').forEach(input => {
                input.value = input.name.includes('[rate]') ? '20' : '';
            });
            newRow.querySelector('.qty-input').value = '1';
            productTable.appendChild(newRow);
        }
        if (event.target.classList.contains('remove-row-btn')) {
            if (productTable.querySelectorAll('tr').length > 1) {
                event.target.closest('tr').remove();
                calculateAmounts();
            }
        }
    });

    calculateAmounts();
});
</script>
@endsection

@push('masterScripts')
  <script>
    $(document).ready(function() {
        $('.select2bs4').select2({
      theme: 'bootstrap4',
      dropdownCssClass: 'scrollable-dropdown'
    });
    });

  </script>
  @endpush