@extends('layout.layout')
@section('content')  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="padding:20px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add New Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create Order</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" style="background-color:#fff;padding:20px;">
      <div class="container-fluid">
      <section class="order-form">
            <div class="order-form-header">
                <h2>Bill No. : #654648</h2>
                <div class="date-time">
                    <div>Date: <span id="currentDate"></span></div>
                    <div>Date: <span id="currentTime"></span></div>
                </div>
            </div>
            <form>
                <div class="table-selection">
                    <label for="table">Table</label>&nbsp;&nbsp;
                    <select id="table" style="padding:3px;">
                        <option value="" selected disabled>Select Table</option>
                        @foreach($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->table_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="product-selection">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Rate</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select  class="product-dropdown form-control select2bs4">
                                        <option value="" selected disabled>Select Product</option>
                                        @foreach($product as $products)
                                        <option value="{{ $products->id }}">{{ $products->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="number" class="quantity" placeholder="Qty"></td>
                                <td><input type="text" class="rate" readonly></td>
                                <td><input type="text" class="amount" readonly></td>
                                <td>
                                    <button type="button" class="add-btn">+</button>
                                    <button type="button" class="remove-btn">x</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="amount-summary">
                    <div class="summary-item">
                        <label>Gross Amount</label>
                        <input type="text" class="gross-amount" readonly>
                    </div>
                    <div class="summary-item">
                        <label>Vat 13%</label>
                        <input type="text" class="vat-amount" readonly>
                    </div>
                    <div class="summary-item">
                        <label>Discount</label>
                        <input type="text" class="discount" placeholder="Discount">
                    </div>
                    <div class="summary-item">
                        <label>Net Amount</label>
                        <input type="text" class="net-amount" readonly>
                    </div>
                </div>

                <div class="action-buttons">
                <center><button type="submit" class="create-order-btn">Create Order</button></center>
                    <center><a href="{{route('orders.index')}}" class="btn btn-secondary" style="background-color:#FFC300;"><font color="#000;"><b>Back</b></font></a></center>
                    <!-- <button type="button" class="back-btn">Back</button> -->
                </div>
            </form>
        </section>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
		const dateElement = document.getElementById('currentDate');
		const timeElement = document.getElementById('currentTime');

		// Display current date and time
		const currentDate = new Date();
		dateElement.textContent = currentDate.toISOString().split('T')[0];
		timeElement.textContent = currentDate.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });

		// Add functionality to buttons
		const addButton = document.querySelector('.add-btn');
		const removeButton = document.querySelector('.remove-btn');

		addButton.addEventListener('click', function () {
			// Functionality for adding a new product row
			alert('Add product row functionality goes here.');
		});

		removeButton.addEventListener('click', function () {
			// Functionality for removing the product row
			alert('Remove product row functionality goes here.');
		});
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

