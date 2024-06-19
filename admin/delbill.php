

<?php session_start(); ?>
<?php
 include 'db2.php';
$id =$_REQUEST['id'];

$result = mysqli_query($conn,"SELECT * FROM bill WHERE id  = '$id'");
$test = mysqli_fetch_array($result);
if (!$result) 
		{
		die("Error: Data not found..");
		}
				$id=$test['id'] ;
			

?>


<div class="fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
      <div>
        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
          <!-- Heroicon name: check -->
		  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"> <g> <path fill="none" d="M0 0H24V24H0z"/> <path d="M12 19c.828 0 1.5.672 1.5 1.5S12.828 22 12 22s-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm0-17c3.314 0 6 2.686 6 6 0 2.165-.753 3.29-2.674 4.923C13.399 14.56 13 15.297 13 17h-2c0-2.474.787-3.695 3.031-5.601C15.548 10.11 16 9.434 16 8c0-2.21-1.79-4-4-4S8 5.79 8 8v1H6V8c0-3.314 2.686-6 6-6z"/> </g> </svg>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <div class="mt-3 text-center sm:mt-5">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
the bill has been paid? 
          </h3>
          <div class="mt-2">
            <p class="text-sm leading-5 text-gray-500">
        Please Confirm
            </p>
          </div>
        </div>
      </div>
	  <form action="delbillexec.php" method="post">

<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="submit"  class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-blue-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5" nsme="ok" value="Yes">
</form>
<link rel="stylesheet" href="./css/facebox.css">
      <div class="mt-5 sm:mt-6">
        <span class="flex w-full rounded-md shadow-sm">
            <a href="adbillsum.php">
          <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
  Back
          </button>
          
        </span>
      </div>
    </div>
  </div>
</div>

</html>

<script>
function updateSubTotal() {
  var table = document.getElementById("myTable");
  let subTotal = Array.from(table.rows).slice(1).reduce((total, row) => {
    return total + parseFloat(row.cells[1].innerHTML);
  }, 0);
  document.getElementById("val").innerHTML = "SubTotal = $" + subTotal.toFixed(2);
}

function onClickRemove(deleteButton) {
  let row = deleteButton.parentElement.parentElement;
  row.parentNode.removeChild(row);
  updateSubTotal(); // Call after delete
}
</script>

<html>
<head>
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  </head>
  <!--
  Tailwind UI components require Tailwind CSS v1.8 and the @tailwindcss/ui plugin.
  Read the documentation to get started: https://tailwindui.com/documentation
-->

