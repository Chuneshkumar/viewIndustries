<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../content/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <script defer src="../content/font-awesome/js/brands.js"></script>
  <script defer src="../content/font-awesome/js/solid.js"></script>
  <script defer src="../content/font-awesome/js/fontawesome.js"></script>
  <!-- Stylesheet -->
  <link rel="stylesheet" href="../content/css/adminPages.css">
  <link rel="stylesheet" href="../content/css/tablePagination.css">
  <link rel="stylesheet" href="../content/css/viewIndustries.css">
  <link rel="stylesheet" href="../content/css/sidebar.css">
  <link rel="stylesheet" href="../content/css/manageCompanyUserMobile.css">
  <title>View Industries</title>
</head>
<body>
  <button class="list-group-item btn btn-outline-warning" id="sidebarToggler" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">&times;
  </button>
  <header class="py-4">
    <nav class="navbar navbar-light adminnavbar bg-light navbar-expand-lg fixed-top">
      <a href="/" class="navbar-brand ">EaseOfCodes</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navCloseBtn">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navCloseBtn">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-user"></i> Profile</a>
          <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-key"></i> Change Password</a>
          <li class="nav-item"><a href="#" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Modals -->
  <!-- Edit Industry Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="editCategory">New Category</label>
              <input type="text" class="form-control" id="editName">
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Industry Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Should have a php implementation -->
          <p>Are you sure you want to delete <span id="selectedIndustry"></span> ?</p>
          <div class="text-right">
            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Industry Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content ">
        <div class="modal-header text-center">
          <h5 class="modal-title" id="addModalLabel">Add Industry</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <div class="form-group">
              <label for="addIndustry">Name</label>
              <input type="text" class="form-control" id="addIndustry">
            </div>
            <div class="text-center">
              <!-- <button type="button" class="btn btn-light" data-dismiss="modal">Close</button> -->
              <button type="submit" class="btn btn-warning "><i class="fas fa-edit"></i> Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="main">
    <div class="mx-3">
      <div class="container-md">
        <!-- Heading Row -->
        <div class="row justify-content-center py-2">
          <div class="col-12">
            <h1 class="text-center pageHeading">Industry /<span id="industryCategory">Category</span></h1>
          </div>
        </div>
        <!-- Add Industry Row -->
        <div class="row py-3">
          <div class="col-12 text-left IndustriesTable mx-auto">
            <a title="Add Industry" class="btn btn-warning" data-toggle="modal" data-target="#addModal" href="#"><i class="fa fa-plus"></i> Add Category</a>
            <!-- <a href="javascript:viod(0);" class="btn btn-warning"><i class="fa fa-plus"></i> Add</a>   -->
          </div>
        </div>
        <!-- Table Row -->
        <div class="row">
          <div class="col px-0 tableContainer IndustriesTable mx-auto" >
          	<div class="" >
            	<table class="table table-borderless">
        			  <thead>
                  <!-- Table Heeading -->
        			    <tr>
      		          <div class="row" >
                      <th scope="col" class="pr-3 py-4 col-1">Count</th>
                      <th scope="col" class="pr-3 py-4 col-auto">Name</th>
                      <th scope="col" class="pr-3 py-4 col-2">Creation on</th>
                      <!-- <th scope="col" class="pr-3 py-4 col-3">Email</th> -->
        				      <!-- <th scope="col" class="pr-3 py-4 col-5">Location</th> -->
                      <!-- For Actions like Edit and Delete -->
        				      <th scope="col" class="pr-3 py-4 col-3"></th>
        			  	  </div>
        			    </tr>
        			  </thead>
        			  <tbody>
                <?php
                  // Get categorical no. of entries in table from Database, if category is specified
                  $TotalEntries = 68;  /* Should get from DB */
                  $nTotalPages = ceil($TotalEntries / 5); /* Calculating Total pages */
                   /* Default CurrentPage Setting */
                  if(isset($_GET["page"])) {
                    $PageN = $_GET["page"];
                  }
                  else{
                    $PageN = 1; /* $PageN stands for Page Number or Current Page*/
                  }
                  $CurrentEntry=$PageN*5-4; /* Calculating first entry for current page */
                  /* for last entry in table's currentpage */
                  if($PageN==$nTotalPages){

                    $UpperLimit = $CurrentEntry + ($TotalEntries-$CurrentEntry);
                  }
                  else{
                    $UpperLimit=$CurrentEntry+4;
                  }
                  ?>
                  <?php
                    // Lor loop for generating table entries
                    for ($a = $CurrentEntry; $a <= $UpperLimit ; $a++) {
                      /* data used is just a placeHolder. Replace in final logic */
                      $PresentDate = Date("d-m-Y H:i:s");
                      // Again, this has to come from backend implementation
                      echo "<tr>
                      <td scope=\"row\" class=\"pr-3 pb-4\">$a</td>
                      <td> ZoneTech $a</td>
                      <td> $PresentDate </td>
                      <td class=\"d-flex align-items-center justify-content-around\" >
                       <a title=\"Edit\" href=\"#\" class=\"tableActionBtn px-2\" data-toggle=\"modal\" data-target=\"#editModal\"><i class=\"fas fa-edit\" ></i> Edit</a>
                       <a title=\"DELETE\" href=\"#\" class=\"tableActionBtn px-2\" data-toggle=\"modal\" data-target=\"#deleteModal\" ><i class=\"fas fa-trash\"></i> Delete</a></td>
                     </tr>";
                    }
                   ?>
        			  </tbody>
      			  </table>
        		</div>
          </div>
        </div>
        <!-- Table Footer -->
        <div class="afterTable IndustriesTable mx-auto row justify-content-between align-items-center" >
          <div  class="col-auto text-muted tableCaption">
            <span><?php  echo "$CurrentEntry"?>
            </span>
            -<?php echo"$UpperLimit"?> out of
            <span><?php echo "$TotalEntries"?></span>
          </div>
          <!-- Pagination -->
          <nav aria-label="Table Page navigation">
            <ul class="pagination">
            <!-- Button for First Page -->
            <li class="page-item <?php if($PageN==1) echo "disabled"; ?>">
              <a class="page-link firstTablePage" href="viewindustry.php?page=1" aria-label="First">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li class="page-item <?php if(($nTotalPages==1) || ($PageN==1)) echo "disabled"; ?>">
              <a class="page-link" href="viewindustry.php?page=<?php if($PageN !=1){$PreviousPage = $PageN-1;} else { $PreviousPage=1;} echo $PreviousPage ?>" aria-label="Previous">
                <span aria-hidden="true">&lt;Back</span>
              </a>
            </li>
            <?php
              // Manually defined the links for upto 4 pages, after that, its automated
              if($nTotalPages==1){
              echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
              }
              else if($nTotalPages==2){
                if($PageN==1){
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item\"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                }
                else{
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                }
              }
              else if($nTotalPages==3){
                if($PageN==1){
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item\"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=3\" class=\"page-link\">3</a></li>";
                }
                else if($PageN==2){
                  echo "<li class=\"page-item\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=3\" class=\"page-link\">3</a></li>";
                }
                else{
                  echo "<li class=\"page-item\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=3\" class=\"page-link\">3</a></li>";
                }
              }
              else if($nTotalPages==4){
                if($PageN==1){
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=3\" class=\"page-link\">3</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=4\" class=\"page-link\">4</a></li>";
                }
                else if($PageN==2){
                  echo "<li class=\"page-item\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=3\" class=\"page-link\">3</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=4\" class=\"page-link\">4</a></li>";
                }
                else if($PageN==3){
                  echo "<li class=\"page-item\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=3\" class=\"page-link\">3</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=4\" class=\"page-link\">4</a></li>";
                }
                else{
                  echo "<li class=\"page-item\"><a href=\"viewindustry.php?page=1\" class=\"page-link\">1</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=2\" class=\"page-link\">2</a></li>";
                  echo "<li class=\"page-item \"><a href=\"viewindustry.php?page=3\" class=\"page-link\">3</a></li>";
                  echo "<li class=\"page-item active\"><a href=\"viewindustry.php?page=4\" class=\"page-link\">4</a></li>";
                }
              }
              else{
                if($PageN==1){
                  echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"viewindustry.php?page=1\">1</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link\" href=\"viewindustry.php?page=2\">2</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=3\">...</a></li>";
                  $temporary = $nTotalPages-1;
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$temporary\">$temporary</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$nTotalPages\">$nTotalPages</a></li>";
                }
                else if($PageN==2){
                  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"viewindustry.php?page=1\">1</a></li>";
                  echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"viewindustry.php?page=2\">2</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=3\">...</a></li>";
                  $temporary = $nTotalPages-1;
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$temporary\">$temporary</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$nTotalPages\">$nTotalPages</a></li>";
                }
                else if($PageN<($nTotalPages-2)){
                  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"viewindustry.php?page=1\">1</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link\" href=\"viewindustry.php?page=2\">2</a></li>";
                  $BackwardEllipsisPageNumber = $PageN-1;
                  echo "<li class=\"page-item\"><a class=\"page-link \" href=\"viewindustry.php?page=$BackwardEllipsisPageNumber\">...</a></li>";

                  echo "<li class=\"page-item active\"><a class=\"page-link \" href=\"viewindustry.php?page=$PageN\">$PageN</a></li>";
                  $ForwardEllipsisPageNumber = $PageN+1;
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$ForwardEllipsisPageNumber\">...</a></li>";
                  $temporary = $nTotalPages-1;
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$temporary\">$temporary</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$nTotalPages\">$nTotalPages</a></li>";
                }
                else if($PageN==($nTotalPages-2)){
                  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"viewindustry.php?page=1\">1</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link\" href=\"viewindustry.php?page=2\">2</a></li>";
                  $BackwardEllipsisPageNumber = $PageN-1;
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$BackwardEllipsisPageNumber\">...</a></li>";
                  echo "<li class=\"page-item active\"><a class=\"page-link \" href=\"viewindustry.php?page=$PageN\">$PageN</a></li>";
                  $temporary = $nTotalPages-1;
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$temporary\">$temporary</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$nTotalPages\">$nTotalPages</a></li>";
                }
                else if($PageN==($nTotalPages-1)){
                  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"viewindustry.php?page=1\">1</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link\" href=\"viewindustry.php?page=2\">2</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=3\">...</a></li>";
                  echo "<li class=\"page-item active\"><a class=\"page-link \" href=\"viewindustry.php?page=$PageN\">$PageN</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$nTotalPages\">$nTotalPages</a></li>";
                }
                else if($PageN==$nTotalPages){
                  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"viewindustry.php?page=1\">1</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link\" href=\"viewindustry.php?page=2\">2</a></li>";
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=3\">...</a></li>";
                  $temporary = $nTotalPages-1;
                  echo "<li class=\"page-item \"><a class=\"page-link \" href=\"viewindustry.php?page=$temporary\">$temporary</a></li>";
                  echo "<li class=\"page-item active\"><a class=\"page-link \" href=\"viewindustry.php?page=$nTotalPages\">$nTotalPages</a></li>";
                }
              }
             ?>
            <li class="page-item <?php if(($nTotalPages==1) || ($PageN == $nTotalPages)) {echo "disabled";} ?>">
              <a class="page-link nextTablePage" href="viewindustry.php?page=<?php if($PageN !=$nTotalPages){$NextPage = $PageN+1;} else { $NextPage=$nTotalPages;} echo $NextPage ?>" aria-label="Next">
                <span aria-hidden="true">Next&gt;</span>
              </a>
            </li>
            <li class="page-item <?php if(($PageN==1) || ($PageN==$nTotalPages)) echo "disabled"; ?>">
              <a class="page-link lastTablePage " href="viewindustry.php?page=<?php echo $nTotalPages ?>" aria-label="Last">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
          </nav>
        </div>

      </div>
    </div>
  </div>


  <!-- Div for Styling might delete later once footer is installed -->
  <div >
    <h1>&nbsp;</h1>
  </div>

  <!-- SideBar || Might get changed down the line -->
  <div class="sidebar open">
          <div class="list-group">
            <div class="list-group-item">&nbsp;</div>
          </div>
          <div class="list-group list-group-flush">

            <div class="category-courses">
  	            <a href="#" class="list-group-item disabled">Category Courses</a>
  	            <div class="category-courses-view">
  	              <a href="#" id="viewDropdownMenuLink" class="list-group-item list-group-item-action"><i class="fas fa-binoculars"></i> View</a>
  	              <div class="d-none" aria-labelledby="viewDropdownMenuLink">
  	                <a class="dropdown-item" href="#">View</a>
  	                <a class="dropdown-item" href="#">Add</a>
  	                <a class="dropdown-item" href="#">Update</a>
  	                <a class="dropdown-item" href="#">Delete</a>
  	              </div>
  	            </div>
  	            <div class="category-courses-add">
  	            <a href="#" id="addDropdownMenuLink" class="list-group-item list-group-item-action"><i class="fas fa-plus"></i> Add</a>
  	            <div class="d-none" aria-labelledby="addDropdownMenuLink">
  	              <a class="dropdown-item" href="#">View</a>
  	              <a class="dropdown-item" href="#">Add</a>
  	              <a class="dropdown-item" href="#">Update</a>
  	              <a class="dropdown-item" href="#">Delete</a>
  	            </div>
  	          </div>
  	          <div class="category-courses-update">
  	            <a href="#" id="updateDropdownMenuLink" class="list-group-item list-group-item-action"><i class="fas fa-edit"></i> Update</a>
  	            <div class="d-none" aria-labelledby="updateDropdownMenuLink">
  	              <a class="dropdown-item" href="#">View</a>
  	              <a class="dropdown-item" href="#">Add</a>
  	              <a class="dropdown-item" href="#">Update</a>
  	              <a class="dropdown-item" href="#">Delete</a>
  	            </div>
  	          </div>
  	          <div class="category-courses-delete">
  	            <a href="#" id="updateDropdownMenuLink" class="list-group-item list-group-item-action"><i class="fas fa-trash"></i> Delete</a>
  	            <div class="d-none" aria-labelledby="addDropdownMenuLink">
  	              <a class="dropdown-item" href="#">View</a>
  	              <a class="dropdown-item" href="#">Add</a>
  	              <a class="dropdown-item" href="#">Update</a>
  	              <a class="dropdown-item" href="#">Delete</a>
  	            </div>
  	          </div>
           </div>
          <div class="manage pt-3">
              <a href="#" class="list-group-item disabled">Manage</a>
              <a href="./managecompanies.php" class="list-group-item  list-group-item-action sidebarLinkactive"><i class="fas fa-tasks"></i> Manage companies</a>
              <a href="./manageusers.php" class="list-group-item list-group-item-action"><i class="fas fa-tasks"></i> Manage users</a>
            </div>
          </div>
  </div>

  <!-- JQuery & Bootstrap Scripts -->
    <script src="../content/js/jquery-3.5.1.min.js" charset="utf-8"></script>
    <script src="../content/bootstrap/js/bootstrap.js" charset="utf-8"></script>
  <!-- Custom Scripts -->
  <script src="../content/js/viewIndustries.js" charset="utf-8"></script>
  <script src="../content/js/sidebar.js" charset="utf-8"></script>
</body>
</html>
