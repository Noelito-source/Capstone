<?php include('../../database/connection.php'); ?>
<?php
abstract class Charges
{
	public $consumption = 0;
	public $cu_m = 0;
	public $pricePerCubic = 0;
	public $mininum_cubic = 0;
	public $maximum_cubic = 0;
	public $amount = 0;
	function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	{
		$this->pricePerCubic = $pricePerCubic;
		$this->mininum_cubic = $mininum_cubic;
		$this->maximum_cubic = $maximum_cubic;
		$this->consumption = $consumption;
	}
	protected function calculateAmount()
	{
		if ($this->consumption >= $this->mininum_cubic && $this->consumption <= $this->maximum_cubic) {
			$this->cu_m = ($this->consumption - $this->mininum_cubic) + 1;
		}
		if ($this->consumption > $this->maximum_cubic) {
			$this->cu_m = ($this->maximum_cubic - $this->mininum_cubic) + 1;
		}
		if ($this->cu_m != 0 || !$this->cu_m) {
			$this->amount = $this->pricePerCubic * $this->cu_m;
		}
	}
}
class FirstCharge extends Charges
{
	function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	{
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	}
	protected function calculateAmount()
	{
		if ($this->consumption <= $this->maximum_cubic) {
			$this->cu_m = $this->consumption;
		} else {
			$this->cu_m = $this->maximum_cubic;
		}
		$this->amount = $this->pricePerCubic;
	}
}
class SecondCharge extends Charges
{
	function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	{
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	}
}
class ThirdCharge extends Charges
{
	function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	{
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	}
}
class FourthCharge extends Charges
{
	function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	{
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	}
}
class FifthCharge extends Charges
{
	function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	{
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	}
}
class SucceedingCharge extends Charges
{
	function __construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic)
	{
		parent::__construct($consumption, $pricePerCubic, $mininum_cubic, $maximum_cubic);
		$this->calculateAmount();
	}
	protected function calculateAmount()
	{
		if ($this->consumption > $this->mininum_cubic) {
			$this->cu_m = $this->consumption - $this->mininum_cubic;
		}
		if ($this->cu_m != 0 || !$this->cu_m) {
			$this->amount = $this->pricePerCubic * $this->cu_m;
		}
	}
}
?>
<?php
$query = "SELECT * FROM users1 WHERE unique_id = " . $_GET['userid'];
$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
$user_id = $user['user_id'];

//Change mo lang yung ORDER BY date DESC to ORDER BY id DESC
$query = "SELECT * FROM bill WHERE owners_id = $user_id ORDER BY id DESC";
$result = mysqli_query($sql_con, $query);
$bill = mysqli_fetch_assoc($result);
$latest_bill = mysqli_num_rows($result);

if ($latest_bill) {
	$query = "SELECT * FROM payment WHERE user_id = $user_id AND bill_id = " . $bill['id'];
	$result = mysqli_query($sql_con, $query);
	$payment = mysqli_fetch_assoc($result);
	$is_bill_has_payment = mysqli_num_rows($result);
}
//to show latest bill of user


//check if consumer has latest bill
if ($latest_bill) {
	$consumption = $bill['pres'] - $bill['prev'];
	$first_charges = new FirstCharge($consumption, 125, 0, 5);
	$second_charges = new SecondCharge($consumption, 27, 6, 10);
	$third_charges = new ThirdCharge($consumption, 29, 11, 20);
	$fourth_charges = new FourthCharge($consumption, 31, 21, 30);
	$fifth_charges = new FifthCharge($consumption, 33, 31, 40);
	$succeeding_charges = new SucceedingCharge($consumption, 35, 40, 0);

	$sub_total = $first_charges->amount + $second_charges->amount + $third_charges->amount + $fourth_charges->amount + $fifth_charges->amount + $succeeding_charges->amount;
	$total_amount_due = $sub_total + $bill['balance'];
	//automated reference number
	$reference_number = 'PWBS' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9) . '' . rand(1, 9);
}
?>
<style>
	.container_content {
		background: #ffffff;
		border: 1px solid #f2f2f2;
		border-bottom-width: 1px;
		border-bottom-style: dashed;
		border-bottom-color: #121212;
		box-shadow: inset 1px solid #121212, 1px solid #121212;
	}

	.header h3 {
		/* font-size: 30pt; */
		font-size: 20pt;
		font-weight: bold;
		color: #4a4a4a;
		border-bottom: 1px solid #8b572a;
		text-align: center;
	}

	.main-head {
		font-weight: bold;
		font-family: Roboto;
		padding: 0px;
		margin: 0px;
	}

	.title {
		margin-top: 10px;
		font-size: 15pt;
	}

	.sub-title {
		font-size: 9pt;
	}

	.bold {
		font-weight: bold;
	}

	.regular-text {
		font-size: 11pt;
	}

	.error {
		border: 1px solid red !important;
	}

	.mobile-latest-view {
		display: none;
	}

	@media screen and (max-width: 768px) {
		.container_content {
			display: none;
		}

		.mobile-latest-view {
			display: block;
		}
	}
</style>
<!-- Modal for payment -->
<div class="modal fade" id="modalToPay" style="z-index: 4000 !important;">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content modal-payment-container rounded-0">
			<div class="modal-header border-0">
				<h5 class="modal-title" id="exampleModalLabel">Scan to Pay</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form id="payNowBillForm">
				<div class="modal-body">
					<input type="hidden" name="consumerid" id="consumerid" value="<?php echo $user_id ?>">
					<input type="hidden" name="billid" id="billid" value="<?php echo $bill['id'] ?>">
					<div class="input-con px-3 d-flex align-items-center">
						<label class=" p-0 m-0">Reference no. &nbsp;</label>
						<input type="text" name="refNumber" id="refNumber" class="m-0 p-0 fw-bold bg-white border-0" style="outline:none;" value="<?php echo $reference_number ?>" readonly>
					</div>
					<div class="d-flex justify-content-center align-items-center">
						<img src="../admin/php/images/qrgcash.png" class="img-responsive" alt="GCash Qr Code" width="80%" height="350" style="object-fit:contain;">
					</div>
					<div class="input-con px-3">
						<label class=" p-0 m-0">Total Amount Due</label>
						<input type="text" id="amountDue" class="form-control rounded-0 bg-white" amount-due="<?php echo $total_amount_due ?>" value="<?php echo "₱ $total_amount_due.00" ?>" readonly>
					</div>
					<div class="input-con px-3">
						<label class=" p-0 m-0">Amount to pay</label>
						<input type="number" name="payAmount" id="payAmount" class="form-control rounded-0 bg-white" required>
						<small id="errorAmount" class="text-danger "></small>
					</div>
					<div class="input-con px-3">
						<label class=" p-0 m-0">Screenshot of Payment</label>
						<input type="file" name="paymentProof" id="paymentProof" class="form-control rounded-0" required>
					</div>
					<div class="modal-footer border-0">
						<button type="submit" id="btnSubmitPay" class="btn btn-primary rounded-0" disabled>Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal for payment end -->

<!-- Modal for payment viewing payment -->
<div class="modal fade" id="modalViewPayment" style="z-index: 4000 !important;">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content modal-viewpayment-container rounded-0">
			<div class="modal-header border-0">
				<h5 class="modal-title" id="exampleModalLabel">Payment</h5>
			</div>
			<div class="modal-body modal-body-viewpayment">

			</div>
		</div>
	</div>
</div>
<!-- Modal for payment viewing payment end -->
<?php if ($latest_bill) : ?>
	<?php if (!$is_bill_has_payment || $payment['status'] == 'Declined') : ?>
		<div class="my-1 btn-paid text-end border-bottom py-3 px-4">
			<button type="button" id="btnPaid" class="btn btn-primary bill-text" data-bs-toggle="modal" data-bs-target="#modalToPay"> <i class="bi bi-credit-card-fill"></i> Paybill now</button>
		</div>
	<?php else : ?>
		<?php if ($payment['status'] == 'Pending') : ?>
			<h6 class=" px-2">The payment on this bill has been received</h6>
			<div class="my-1 btn-paid text-end border-bottom py-3 px-4">
				<button type="button" id="btnViewPayment" class="btn btn-primary bill-text" data-bs-toggle="modal" data-bs-target="#modalViewPayment"> <i class="bi bi-search"></i> View payment</button>
			</div>
		<?php elseif ($payment['status'] == 'Approved') : ?>
			<div class="my-1 btn-paid text-end border-bottom py-3 px-4">
				<button type="button" class="btn btn-success bill-text"> <i class="bi bi-check-circle-fill"></i> Bill was paid</button>
			</div>
		<?php endif; ?>
	<?php endif; ?>
	<div class="container_content p-5 shadow" id="container_content">
		<div class="">
			<p class="p-0 m-0 regular-text">Status: <span class="<?php echo $bill['status'] == 'Unpaid' ? 'text-danger' : 'text-success'; ?>"><?php echo $bill['status'] ?></span></p>
		</div>
		<?php
		$from =  date('F 29, Y', strtotime('-2 month', strtotime($bill['date'])));
		$to =  date('F 29, Y', strtotime('-1 month', strtotime($bill['date'])));
		?>
		<div class="row">
			<div class="col-2">
			</div>
			<div class="col-2 regular-text">from</div>
			<div class="col-3 regular-text">
				<?php echo $from ?>
			</div>
			<div class="col-2 regular-text">to</div>
			<div class="col-3 regular-text">
				<?php echo $to ?>
			</div>
		</div>
		<?php
		$query = "SELECT * FROM users1 WHERE user_id = " . $bill['owners_id'];
		$user = mysqli_fetch_assoc(mysqli_query($sql_con, $query));
		?>

		<div class="row">
			<div class="col-md-3">
				<div class="row">
					<div class="col-6">
						<p class="p-0 m-0 regular-text">Present</p>
						<p class="p-0 m-0 regular-text">Previous</p>
						<p class="p-0 m-0 regular-text">Consumption</p>
					</div>
					<div class="col-6">
						<p class="p-0 m-0 regular-text text-center "><?php echo $bill['pres'] ?></p>
						<p class="p-0 m-0 regular-text text-center text-decoration-underline"><?php echo $bill['prev'] ?></p>
						<p class="p-0 m-0 regular-text text-center "><?php echo $bill['pres'] - $bill['prev'] ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-4">
						<p class="p-0 m-0 regular-text">1st 5cu.m(min)</p>
						<p class="p-0 m-0 regular-text">2nd 5cu.m(6-10)</p>
						<p class="p-0 m-0 regular-text">3rd 10 cu.m(11-20)</p>
						<p class="p-0 m-0 regular-text">4th 10 cu.m(21-30)</p>
						<p class="p-0 m-0 regular-text">5th 10 cu.m(31-40)</p>
						<p class="p-0 m-0 regular-text">Succeeding cu.m</p>
					</div>
					<div class="col-1">
						<p class="p-0 m-0 regular-text">125.00</p>
						<p class="p-0 m-0 regular-text">27.00</p>
						<p class="p-0 m-0 regular-text">29.00</p>
						<p class="p-0 m-0 regular-text">31.00</p>
						<p class="p-0 m-0 regular-text">33.00</p>
						<p class="p-0 m-0 regular-text">35.00</p>
					</div>
					<div class="col-2">
						<p class="p-0 m-0 regular-text text-center">&nbsp;</p>
						<p class="p-0 m-0 regular-text text-center">x</p>
						<p class="p-0 m-0 regular-text text-center">x</p>
						<p class="p-0 m-0 regular-text text-center">x</p>
						<p class="p-0 m-0 regular-text text-center">x</p>
						<p class="p-0 m-0 regular-text text-center">x</p>
					</div>
					<div class="col-1">
						<p class="p-0 m-0 regular-text"><?php echo $first_charges->cu_m ?></p>
						<p class="p-0 m-0 regular-text"><?php echo $second_charges->cu_m ?></p>
						<p class="p-0 m-0 regular-text"><?php echo $third_charges->cu_m ?></p>
						<p class="p-0 m-0 regular-text"><?php echo $fourth_charges->cu_m ?></p>
						<p class="p-0 m-0 regular-text"><?php echo $fifth_charges->cu_m ?></p>
						<p class="p-0 m-0 regular-text"><?php echo $succeeding_charges->cu_m ?></p>
					</div>
					<div class="col-2">
						<p class="p-0 m-0 regular-text">= &#8369;</p>
						<p class="p-0 m-0 regular-text">= &#8369;</p>
						<p class="p-0 m-0 regular-text">= &#8369;</p>
						<p class="p-0 m-0 regular-text">= &#8369;</p>
						<p class="p-0 m-0 regular-text">= &#8369;</p>
						<p class="p-0 m-0 regular-text">= &#8369;</p>
					</div>
					<div class="col-2">
						<p class="p-0 m-0 regular-text text-end "><?php echo $first_charges->amount ?></p>
						<p class="p-0 m-0 regular-text text-end "><?php echo $second_charges->amount ?></p>
						<p class="p-0 m-0 regular-text text-end "><?php echo $third_charges->amount ?></p>
						<p class="p-0 m-0 regular-text text-end "><?php echo $fourth_charges->amount ?></p>
						<p class="p-0 m-0 regular-text text-end "><?php echo $fifth_charges->amount ?></p>
						<p class="p-0 m-0 regular-text text-end "><?php echo $succeeding_charges->amount ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="row my-2">
			<div class="col-md-6">
				<div class="row">
					<div class="col-4">
						<p class="p-0 m-0 regular-text">DUE DATE:</p>
						<p class="p-0 m-0 regular-text">Prepared by:</p>
						<p class="p-0 m-0 regular-text">Date Issued: </p>
					</div>
					<?php
					$date_issued = date('F d, Y', strtotime($bill['date']));
					$due_date = date('F d, Y', strtotime('7 day', strtotime($bill['date'])));
					?>
					<div class="col-8">
						<p class="p-0 m-0 regular-text"><?php echo $due_date ?></p>
						<p class="p-0 m-0 regular-text bold text-decoration-underline"><?php echo $bill['prepared_by'] ?></p>
						<p class="p-0 m-0 regular-text"><?php echo $date_issued ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="row">
					<div class="col-7">
						<p class="p-0 m-0 regular-text">SUB-TOTAL:</p>
						<p class="p-0 m-0 regular-text">UNPAID BALANCE:</p>
						<p class="p-0 m-0 regular-text">CBU/OTHERS: </p>
						<p class="p-0 m-0 regular-text fw-bold">TOTAL AMOUNT DUE: </p>
					</div>
					<div class="col-5">
						<p class="p-0 m-0 regular-text text-end text-danger border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $sub_total ?></p>
						<p class="p-0 m-0 regular-text text-end border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $bill['balance'] ?></p>
						<p class="p-0 m-0 regular-text text-end border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-</p>
						<p class="p-0 m-0 bold regular-text text-end border-bottom border-dark">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $total_amount_due ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row mobile-latest-view border-bottom my-1 py-3">
		<div class="col-md-2 py-2">
			<div id="previous">
				<h6 class=" p-0 m-0 bill-text text-center">Previous Reading</h6>
				<p class=" p-0 m-0 bill-text text-center " style="font-weight:bold;"><?php echo $bill['prev'] ?></p>
			</div>
		</div>
		<div class="col-md-2 py-2">
			<div id="present">
				<h6 class=" p-0 m-0 bill-text text-center">Present Reading</h6>
				<p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['pres'] ?></p>
			</div>
		</div>
		<div class="col-md-2 py-2">
			<div id="consumption">
				<h6 class=" p-0 m-0 bill-text text-center">Consumption</h6>
				<p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['pres'] - $bill['prev'] ?></p>
			</div>
		</div>
		<div class="col-md-2 py-2">
			<div id="date">
				<h6 class=" p-0 m-0 bill-text text-center">Due Date</h6>
				<p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo date('m/d/Y', strtotime('7 day', strtotime($bill['date']))) ?></p>
			</div>
		</div>
		<div class="col-md-1 py-2">
			<div id="price">
				<h6 class=" p-0 m-0 bill-text text-center">Sub Total</h6>
				<p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['price'] ?></p>
			</div>
		</div>
		<div class="col-md-1 py-1">
			<div id="balance">
				<h6 class=" p-0 m-0 bill-text text-center">Balance</h6>
				<p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['balance'] ?></p>
			</div>
		</div>
		<div class="col-md-1 py-1">
			<div id="due">
				<h6 class=" p-0 m-0 bill-text text-center">Total Due Amount</h6>
				<p class="bill-text p-0 m-0 text-center " style="font-weight:bold;"><?php echo $bill['price'] + $bill['balance'] ?></p>
			</div>
		</div>
		<div class="col-md-1 py-1">
			<h6 class=" p-0 m-0 bill-text text-center my-1">Status</h6>
			<div class=" d-flex justify-content-center align-items-center">
				<span class="small rounded-pill py-1 px-2" style="font-size: 0.7rem;font-weight:bold;background:#fecaca;color:#dc2626;"><?php echo $bill['status'] ?></span>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="py-5">
		<h6 class="small text-secondary text-center py-5">No latest bill</h6>
	</div>
<?php endif; ?>


<script>
	function validateAmount() {
		if (parseInt($('#payAmount').val()) > parseInt($('#amountDue').attr('amount-due'))) {
			$('#payAmount').addClass('error')
			$('#errorAmount').text('Amount to pay should not exceed to amount due')
			$('#btnSubmitPay').attr('disabled', '')
		} else {
			$('#payAmount').removeClass('error')
			$('#errorAmount').text('')
			$('#btnSubmitPay').removeAttr('disabled')
		}
	}
</script>
<script>
	$('#payNowBillForm').submit(function(e) {
		e.preventDefault();
		let formData = new FormData(this)
		$.ajax({
			url: 'ajax/billsumm/add_payment.php',
			method: 'POST',
			type: 'POST',
			enctype: 'multipart/form-data',
			data: formData,
			processData: false,
			contentType: false,
			success: function(data) {
				$('.modal-payment-container').html(data)
			}
		})

	})

	$('#payAmount').on('input', function() {
		validateAmount();
	})

	$('#btnViewPayment').click(function(e) {
		const billId = $('#billid').val();
		$.ajax({
			url: 'ajax/billsumm/view_payment.php',
			type: 'GET',
			data: {
				billid: billId
			},
			success: function(data) {
				$('.modal-body-viewpayment').html(data)
			}
		})

	})
</script>