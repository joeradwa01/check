<?php
session_start();
   

 $conn = new mysqli('localhost', 'root', '', 'page');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
 
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM form WHERE email = '$email'";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();


      
    $conn->close();
}
?>  
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Sticky Note </title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="icons8-note-48.png" />
      
       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="http://localhost:8080/web/css/style.css">
       <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/css/all.min.css">
         <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
        
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
              <link rel="stylesheet" href="../assets/vendor/@icon/dripicons/dripicons.css">
       
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/core/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/daygrid/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/timegrid/main.css' />
      <link rel='stylesheet' href='../assets/vendor/fullcalendar/list/main.css' />
      <link rel="stylesheet" href="../assets/vendor/mapbox/mapbox-gl.css">  </head>
  <body class="noteplus-layout  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
  </div>
    <div class="page-content">
 
    <div class="right-sidebar-mini right-sidebar">
      <div class="right-sidebar-panel p-0">
          <div class="right-sidebar-toggle bg-primary mt-3" data-extra-toggle="right-sidebar-dissmiss">
                <i class="ri-arrow-left-line side-left-icon"></i>
                <i class="ri-close-fill side-right-icon"></i>
            </div>
          <div class="card shadow-none tag-details mb-0">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title mb-0">Tag List</h4>
                </div>
                <div>
                    <a href="#" data-toggle="modal" data-target="#create-note"><i class="ri-add-line font-size-20"></i></a>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-inline p-3 m-0 pb-0">
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-success">A</div>
                            <h5>Afternoon</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton1"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton1" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-danger">B</div>
                            <h5>Book</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton2"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton2" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-purple">C</div>
                            <h5>Cupcake</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton3"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton3" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-info">D</div>
                            <h5>Dinner</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton4"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton4" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-warning">E</div>
                            <h5>Evening Snacks</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton5"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton5" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-success">F</div>
                            <h5>Fast Track</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton6"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton6" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-danger">G</div>
                            <h5>Good Morning</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton7"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton7" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-info">H</div>
                            <h5>Health</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton8"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton8" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-warning">I</div>
                            <h5>Ice Cream</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton9"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton9" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-success">J</div>
                            <h5>Juice</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton10"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton10" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-danger">K</div>
                            <h5>Kangaroo</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton11"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton11" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-purple">L</div>
                            <h5>Leaves</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton12"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton12" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="mb-3 px-2">
                    <div class="item d-flex align-items-center justify-content-between pb-3 border-bottom">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-info">M</div>
                            <h5>Machine</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton13"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton13" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="px-2">
                    <div class="item d-flex align-items-center justify-content-between">
                        <div class="media align-items-center">
                            <div class="icon icon-btn icon-btn-warning">N</div>
                            <h5>Nail Polish</h5>
                        </div>
                        <div class="dropdown">
                            <span class="dropdown-toggle dropdown-bg" id="tag-dropdownMenuButton14"
                                data-toggle="dropdown" aria-expanded="false" role="button">
                                <i class="ri-more-fill"></i>
                            </span>
                            <div class="dropdown-menu dropdown-menu-right border-none"
                                aria-labelledby="tag-dropdownMenuButton14" style="">
                                <a class="dropdown-item" data-toggle="modal" data-target="#tag-rename" href="#"><i class="las la-pen mr-3"></i>Rename</a>
                                <a class="dropdown-item" data-extra-toggle="delete" data-closest-elem=".item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            </div>
          </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="create-note" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <h4 class="mb-4">Create New Tag</h4>
                        <div class="content create-workform">
                            <input type="text" class="form-control" placeholder="Enter Tag Name">
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-outline-primary mr-4" data-dismiss="modal">Create</div>
                                    <div class="btn btn-primary" data-dismiss="modal">Cancel</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <!-- Modal -->
    <div class="modal fade" id="tag-rename" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <h4 class="mb-4">Rename Your Tag</h4>
                        <div class="content create-workform">
                            <input type="text" class="form-control" placeholder="Enter Tag Name">
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                    <div class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
       <div class="iq-top-navbar">
          <div class="iq-navbar-custom">
              <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                      <i class="ri-menu-line wrapper-menu"></i>
                      <a href="../backend/index.html" class="header-logo">
                              <img src="icons8-note-48.png" class="img-fluid rounded-normal light-logo" alt="logo">
                          
                      </a>
                  </div>
                  <div class="d-flex align-items-center">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                      <i class="ri-menu-3-line"></i>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav ml-auto navbar-list align-items-center">
                          <li class="nav-item nav-icon search-content">
                              <a href="#" class="search-toggle rounded" id="h1-dropdownSearch" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="ri-search-line"></i>
                              </a>
                              <div class="iq-search-bar iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownSearch">
                                  <form action="#" class="searchbox p-2">
                                      <div class="form-group mb-0 position-relative">
                                      <input type="text" class="text search-input font-size-12" placeholder="type here to search...">
                                      <a href="#" class="search-link"><i class="las la-search"></i></a> 
                                      </div>
                                  </form>
                              </div>
                          </li>                
                          <li class="nav-item nav-icon dropdown mail-content">
                              <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="h1-dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="">
                                  <svg width="20" class="svg-icon" id="main-n-010" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                  </svg>
                              </i>
                              <span class="badge badge-primary count-mail mail rounded-circle">2</span>
                              <span class="bg-primary"></span>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownMenuButton2">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="px-3 pt-0 pb-0">
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Emma Watson</h5>
                                                              <small class="text-dark"><b>12 : 47 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Ashlynn Franci</h5>
                                                              <small class="text-dark"><b>11 : 30 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Kianna Carder</h5>
                                                              <small class="text-dark"><b>11 : 21 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                          </div>
                                          <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                              View All
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </li>
                          <li class="nav-item nav-icon dropdown mail-content"> 
                              <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="h1-dropdownMenuButton004" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                              <i class="">
                                  <svg width="20" class="svg-icon" id="main-n-020" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                  </svg>
                              </i>
                              <span class="badge badge-primary count-mail rounded-circle">2</span>
                              <span class="bg-primary "></span>
                              </a>
                              <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="h1-dropdownMenuButton004">
                                  <div class="card shadow-none m-0">
                                      <div class="card-body p-0 ">
                                          <div class="px-3 pt-0 pb-0">
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Emma Watson</h5>
                                                              <small class="text-dark"><b>12 : 47 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3 border-bottom">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Ashlynn Franci</h5>
                                                              <small class="text-dark"><b>11 : 30 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                              <a href="#" class="iq-sub-card">
                                                  <div class="media align-items-center cust-card py-3">
                                                      <div class="">
                                                          <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                      </div>
                                                      <div class="media-body ml-3">
                                                          <div class="d-flex align-items-center justify-content-between">
                                                              <h5 class="mb-0">Kianna Carder</h5>
                                                              <small class="text-dark"><b>11 : 21 pm</b></small>
                                                          </div>
                                                          <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                      </div>
                                                  </div>
                                              </a>
                                          </div>
                                          <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                              View All
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </li>  
                          <li class="caption-content">
                             <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between" id="h-dropdownMenuButton001" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <img src="../assets/images/user/1.jpg" class="img-fluid rounded avatar-50" alt="user">
                              </a>
                              <div class="dropdown-menu dropdown-menu-right w-100 border-0 py-2" aria-labelledby="h-dropdownMenuButton001">
                              
                                   <a class="dropdown-item mb-2" href="user-profile-edit.php">
                                   <a class="dropdown-item mb-2" href="../app/user-profile-edit.php">
                                       <i class="las la-user-edit font-size-20 mr-1"></i>
                                      <span>     Profile</span>
                                  </a>
                                  
                                  <hr class="my-1">
                                  <a class="dropdown-item" href="../backend/index.html">
                                      <i class="las la-sign-out-alt font-size-20 mr-1"></i>
                                      <span>Logout</span>
                                  </a>
                              </div>
                          </li>
                          </ul>                     
                      </div> 
                  </div>
              </nav>
          </div>
      </div>      
      <div class="iq-sidebar  sidebar-default ">
          <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
              <a href="..//index.html" class="header-logo">
                  <img src="icons8-note-48.png" class="img-fluid rounded-normal light-logo" alt="logo"> <h4 class="logo-title ml-3">Sticky Note</h4>
              </a>
              <div class="iq-menu-bt-sidebar">
                  <i class="las la-times wrapper-menu"></i>
              </div>
          </div>    
          <div class="sidebar-caption dropdown">
              <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="../assets/images/user/1.jpg" class="img-fluid rounded avatar-50 mr-3" alt="user">
                  <div class="caption">
                      <h6 class="mb-0 line-height"><?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?></h6>
                  </div>
                  <i class="las la-angle-down"></i>
              </a>
              <div class="dropdown-menu w-100 border-0 my-2" aria-labelledby="dropdownMenuButton">
                
                   <a class="dropdown-item mb-2" href="user-profile-edit.php">
                   <a class="dropdown-item mb-2" href="user-profile-edit.php">
                       <i class="las la-user-edit font-size-20 mr-1"></i>
                      <span>Edit Profile</span>
                  </a>
                
                
                  <hr class="my-2">
                  <a class="dropdown-item" href="auth-sign-in.html">
                      <i class="las la-sign-out-alt font-size-20 mr-1"></i>
                      <span>Logout</span>
                  </a>
              </div>
          </div>
          <div class="data-scrollbar" data-scroll="1">
              <div class="iq-search-bar device-search mb-3">
                  <form action="#" class="searchbox">
                  <a class="search-link" href="#"><i class="ri-search-line"></i></a>
                  <input type="text" class="text search-input" placeholder="Search">
                  </form>
              </div>
              <div class="sidebar-btn dropdown mb-3">
                  <a href="#"  id="dropdownMenuButton01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-primary pr-5 position-relative iq-user-toggle d-flex align-items-center justify-content-between" style="height: 40px;"><span  class="btn-title btn-create"><i class="ri-add-line mr-3"></i>Create New</span><span class="note-add-btn" style="height: 40px;"><i class="las la-angle-down"></i></span></a>
                  <div class="dropdown-menu w-100 border-0 py-3" aria-labelledby="dropdownMenuButton01">
                      <a    class="dropdown-item mb-2" href="#">
                          <span id="myBtn"><i  class="ri-sticky-note-line mr-3"></i>Board</span>
                      </a>
                      
                   
                  </div>
              </div>
              
              <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                      <li class="active">
                              <a href="index.php" class="svg-icon">
                                  <i>
                                      <svg class="svg-icon" id="iq-main-1" width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                      </svg>
                                  </i>
                                  <span>Your Notes</span>
                              </a>
                          <ul id="index" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                          </ul>
                      </li>
                      <li class="">
                          <a href="#notebooks" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
                              <i>
                                  <svg width="20" class="svg-icon" id="iq-main-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                  </svg>
                              </i>
                              <span>Notebooks</span>
                              <i class="las la-angle-right iq-arrow-right arrow-active"></i>
                              <i class="las la-angle-down iq-arrow-right arrow-hover"></i>
                          </a>
                          <ul id="notebooks" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                              <li class="">
                                  <a href="project-board.html" class="svg-icon">
                                      <i>
                                          <svg width="20" class="svg-icon" id="iq-main-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                          </svg>
                                      </i>
                                      <span>Your Boards</span>
                                  </a>
                              </li>
                         
                          </ul>
                      </li>
                      <li class="">
                          <a href="page-reminder.html" class="svg-icon">
                              <i>
                                  <svg width="20" class="svg-icon" id="iq-main-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                              </i>
                              <span>Reminder</span>
                          </a>
                      </li>
                      <li class="" data-extra-toggle="right-sidebar">
                          <a href="javascript:void(0);" class="svg-icon">
                              <i>
                                  <svg width="20" class="svg-icon" id="iq-main-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                  </svg>                            
                              </i>
                              <span>Tags</span>
                          </a>
                      </li>
                      <li class="">
                          <a href="page-bin.html" class="svg-icon">
                              <i>
                                  <svg width="20" class="svg-icon" id="iq-main-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                              </i>
                              <span>Bin</span>
                          </a>
                      </li>

                      

 
                          </ul>
                      </li>
                  </ul>
              </nav>

             
              
              <div id="sidebar-bottom" class="position-relative sidebar-bottom">
                  <div class="card rounded shadow-none">
                         
                      </div>
                  </div>
              </div>
              <div class="p-3"></div>
          </div>
      </div>     
      
      
      
      <div class="content-page">
     <div class="container-fluid note-details">
        <div class="desktop-header">
            <div class="card card-block topnav-left">
                <div class="card-body write-card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="iq-note-callapse-menu">
                            <a class="iq-note-callapse-btn show-note-button" data-toggle="collapse" href="#collapseMenu" role="button"
                                data-extra-toggle="toggle" data-extra-class-show=".hide-note-button" data-extra-class-hide=".show-note-button"
                                aria-expanded="false">
                                <i class="las la-pencil-alt pr-2"></i>Write Your Note
                            </a>
                            <span class="hide-note-button d-none"><i class="las la-folder pr-2"></i>Folder</span>
                        </div>
                        <div class="note-right media align-items-top hide-note-button d-none">
                            <div class="mr-2"><a href="#" class="btn view-btn body-bg" data-toggle="modal" data-target="#share-note">Share</a></div>
                            <div class="view-btn btn-dropdown body-bg rounded">
                                <div class="dropdown">
                                    <span class="dropdown-toggle" id="dropdownMenuButton1" data-toggle="dropdown">
                                        <i class="ri-more-2-fill"></i>
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
                                        <a class="dropdown-item" href="#"><i class="lar la-heart mr-3"></i>Add To Favourite</a>
                                        <a class="dropdown-item" href="#"><i class="las la-thumbtack mr-3"></i>Mark As Pin</a>
                                        <a class="dropdown-item" href="#"><i class="las la-trash-alt mr-3"></i>Move to Trash</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card topnav-right">
                
                <div class="card-body card-content-right">
                    <ul class="list-inline m-0 p-0 d-flex align-items-center justify-content-around">
                        <li class="nav-item nav-icon dropdown">
                            <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="">
                                <svg width="20" class="svg-icon" id="main-n-01" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </i>
                            <span class="badge badge-primary count-mail mail rounded-circle">2</span>
                            <span class="bg-primary"></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pb-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Emma Watson</h5>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Ashlynn Franci</h5>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pt-3">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Kianna Carder</h5>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item nav-icon dropdown pl-3"> 
                            <a href="#" class="search-toggle dropdown-toggle nav-icon-1" id="dropdownMenuButton002" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                            <i class="">
                                <svg width="20" class="svg-icon" id="main-n-02" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </i>
                            <span class="badge badge-primary count-mail rounded-circle">2</span>
                            <span class="bg-primary "></span>
                            </a>
                            <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton002">
                                <div class="card shadow-none m-0">
                                    <div class="card-body p-0 ">
                                        <div class="p-3">
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pb-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/01.jpg" alt="01">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Emma Watson</h5>
                                                            <small class="text-dark"><b>12 : 47 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card py-3 border-bottom">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/02.jpg" alt="02">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Ashlynn Franci</h5>
                                                            <small class="text-dark"><b>11 : 30 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="iq-sub-card">
                                                <div class="media align-items-center cust-card pt-3">
                                                    <div class="">
                                                        <img class="avatar-50 rounded-small" src="../assets/images/user/03.jpg" alt="03">
                                                    </div>
                                                    <div class="media-body ml-3">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <h5 class="mb-0">Kianna Carder</h5>
                                                            <small class="text-dark"><b>11 : 21 pm</b></small>
                                                        </div>
                                                        <small class="mb-0">Lorem ipsum dolor sit amet</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <a class="btn btn-block btn-primary position-relative text-center" href="#" role="button">
                                            View All
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>  
                    </ul>
                </div>            </div>
        </div>
        
        

        <!--create note -->
        <div class="row">

            <div class="col-md-12">
                <div class="collapse" id="collapseMenu">
                    <div class="card card-block card-stretch">
                        <div class="card-body write-card">
                            <div class="container-fluid collapse-fluid">
                                <div class="row">

                                    <div class="col-md-12 col-lg-12 p-0">
                                        <div class="card card-transparent card-block card-stretch event-note">
                                            <div class="card-body px-0 bukmark">
                                                <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                                    <div class="quill-tool">
                                                    </div>


                                                    <div class="iq-full-screen"><a href="#" class="" id="btnFullscreen"><i class="las la-expand-arrows-alt font-size-18"></i></a></div>
                                                </div>
                                                <div id="quill-toolbar">


                                                    
                                                
                                                </div>

 
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-12 p-0 d-flex justify-content-end">
                                        <button class="btn btn-outline-primary" data-extra-toggle="toggle" data-extra-class-show=".show-note-button" data-extra-class-hide=".hide-note-button">Close</button>
                                        <button class="btn btn-primary ml-2" data-extra-toggle="toggle" data-extra-class-show=".show-note-button" data-extra-class-hide=".hide-note-button" id="save"  onclick="newElement()">Save</button>
                                    </div>
                                
                                
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        
            

            <div class="col-lg-12">           

        <div class="card card-block card-stretch">
            
            <div class="card-body custom-notes-space">
                <h3 class="">Your Notes</h3>
                <div class="iq-tab-content">

                    
                    
                    <div class="d-flex flex-wrap align-items-top justify-content-between">
                        <ul class="d-flex nav nav-pills text-center note-tab mb-3" id="note-pills-tab" role="tablist">                                
                            <li class="nav-item">
                                <a class="nav-link home active show" data-toggle="pill" data-init="note" href="#note1" role="tab" aria-selected="false">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link home" data-toggle="pill" data-init="shared-note" href="#note2" role="tab" aria-selected="true">Shared Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link home" data-toggle="pill" data-init="pin-note" href="#note3" role="tab" aria-selected="false">Pin Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link home" data-toggle="pill" data-init="fav-note" href="#note4" role="tab" aria-selected="false">Favourite Notes</a>
                            </li>
                        </ul> 
                          </div>

                       
                          



                    </div>


<!--note -->


                         
<div class="row" id="rowdiv">
     
     
<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'page');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    // Retrieve the user's notes
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM notes WHERE email = '$email'";
    $result = $conn->query($sql);




     // Display each note on the page
    while ($row = $result->fetch_assoc()) {


         print  '<div class="col-lg-24 col-md-auto"> <div id="${noteId}-detail" class="classchange card card-block card-stretch card-height card-bottom-border-info note-detail"> <div class="card-header d-flex justify-content-between pb-1"> <div class="icon iq-icon-box-2 icon-border-info rounded"> <svg width="23" height="23" class="svg-icon" id="iq-main-01" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /> </svg> </div> <div class="card-header-toolbar d-flex align-items-center"> <div class="dropdown"> <span class="dropdown-toggle dropdown-bg" id="note-dropdownMenuButton4" data-toggle="dropdown" aria-expanded="false" role="button"> <i class="ri-more-fill"></i> </span> <div class="dropdown-menu dropdown-menu-right" aria-labelledby="note-dropdownMenuButton4"> <a href="#" class="dropdown-item new-note1" data-toggle="modal" data-target="#new-note1"><i class="las la-eye mr-3"> </i>View</a> <a href="#" class="dropdown-item edit-note1" data-toggle="modal" data-target="#edit-note1"><i class="las la-pen mr-3"></i>Edit</a> <a class="dropdown-item note-close" data-extra-toggle="delete" data-closest-elem=".card" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a> </div> </div> </div> </div> <div class="card-body rounded"> <div class="media flex-wrap align-items-top"> <h4 class="card-title"><p class="mb-3 card-description short"  id="note1-description" > '. $row['content'] .' </p>  </div> <div class="card-footer"> <div class="d-flex align-items-center justify-content-between note-text note-text-info"> <a href="#" class=""><i class=" "></i> </a>    <a href="#" class=""><i class="las la-calendar mr-2 font-size-20"></i>'. $row['date'] .' </a> </div> </div> </div> </div> </div>';

 
    }
    
 
    $conn->close();
}
?>  
<div  id="savenote" class="savenote" >
 
 
</div> 
 
</div>
</div>
</div> 
 

 
        
                  
    </div>
 


   
 <!-- Modal Edit -->
 <div class="modal fade" id="edit-note1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="popup text-left">
                    <div class="media align-items-top justify-content-between">                            
                        <h3 class="mb-3">Weekly Planner</h3>
                        <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                    </div>
                    <div class="content edit-notes">
                        <div class="card card-transparent card-block card-stretch event-note mb-0">
                            <div class="card-body px-0 bukmark">
                                <div class="d-flex align-items-center justify-content-between pb-2 mb-3 border-bottom">                                                    
                                    <div class="quill-tool">
                                    </div>
                                </div>
                                <div id="quill-toolbar1">

                                </div>
                            </div>
                            <div class="card-footer border-0">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-end">
                                    <div class="btn btn-primary mr-3" data-dismiss="modal">Cancel</div>
                                    <div  id="save-edit" class="btn btn-outline-primary" data-dismiss="modal">Save</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Page end  -->
    </div>
    <!-- Share Modal -->
    <div class="modal fade" id="share-note" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <h4 class="mb-3">Share</h4>
                        <div class="content create-workform bg-body">
                            <div class="mb-3">
                                <h5 class="mb-2">Shareable Link</h5>
                                <input type="text" class="form-control" placeholder="" value="Https://Dribble.com/Shots/6387620">
                            </div>      
                            <div class="pb-3">               
                                <h5 class="mb-2">Invite Someone</h5>
                                <input type="text" class="form-control" placeholder="Enter Name or Email">
                            </div>       
                            <div class="col-lg-12 mt-4">
                                <div class="d-flex flex-wrap align-items-ceter justify-content-center">
                                    <div class="btn btn-primary mr-4" data-dismiss="modal">Cancel</div>
                                    <div class="btn btn-outline-primary" data-dismiss="modal">Create</div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>




    
    <!-- Modal -->
    <!-- Modal View -->

    
     <div class="modal fade" id="new-note1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="popup text-left">
                        <div class="media align-items-top justify-content-between">                            
                             <div class="btn-cancel p-0" data-dismiss="modal"><i class="las la-times"></i></div>
                        </div>
                        <div class="content create-workform">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between">
                                   <div class="header-title">
                                      <h4 class="card-title">NotePlus Color</h4>
                                   </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mt-4">
                                      <div class="col-lg-2 col-md-6 text-center">
                    
                                         <p class="bg-primary pt-5 pb-5 text-center rounded"></p> 

                                         <h6>Primary</h6>
                                      </div>
                                      <div class="col-lg-2 col-md-6 text-center">
                                        <a href="#"   > <p  id="bg-secondary" class="bg-secondary pt-5 pb-5 text-center rounded"></p> </a>
                                         <h6>Secondary</h6>
                                      </div>
                                      <div class="col-lg-2 col-md-6 text-center">
                                         <p class="bg-success pt-5 pb-5 text-center rounded"></p>
                                         <h6>Success</h6>
                                      </div>
                                      <div class="col-lg-2 col-md-6 text-center">
                                         <p class="bg-danger pt-5 pb-5 text-center rounded"></p>
                                         <h6>Danger</h6>
                                      </div>
                                      <div class="col-lg-2 col-md-6 text-center">
                                         <p class="bg-warning pt-5 pb-5 text-center rounded"></p>
                                         <h6>Warning</h6>
                                      </div>
                                      <div  id="color-primary" class="col-lg-2 col-md-6 text-center">
                                        <p   class="bg-info pt-5 pb-5 text-center rounded"></p> 
                                         <h6>Info</h6>
                                      </div>
                                      <div class="col-lg-2 col-md-6 text-center mt-4">
                                         <p class="bg-light pt-5 pb-5 text-center rounded"></p>
                                         <h6>Light</h6>
                                      </div>
                                      <div class="col-lg-2 col-md-6 text-center mt-4">
                                         <p class="bg-dark pt-5 pb-5 text-center rounded"></p>
                                         <h6>Dark</h6>
                                      </div>
                                   </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    
     





    
 
<!-- The Modal -->
<div id="myModal" class="modal-create ">

    <!-- Modal content -->
    <div class="modal-content1">
      <span class="closemodal">&times;</span>
      <div class="row">
        <div class="col-lg-12">                
            <div class="card card-block card-stretch pb-2">
                <div class="card-body write-card pb-4">
                    <div class="row">
                        <div class="col-md-8">
                            <form action="">
                                <div class="form-group">
                                    <label class="label-control">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Example Note" value="" data-change="input" data-custom-target="#note-title">
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Description</label>
                                    <textarea type="text" class="form-control" name="description" rows="3" data-change="input" data-custom-target="#note-description" placeholder="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Reminder Date</label>
                                    <input type="date" class="form-control" name="reminder_date" value="2021-01-01" data-change="input" data-custom-target="#note-reminder-date">
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Icon</label>
                                    <div id="icon-button">
                                        <button class="btn btn-outline-primary ml-1 active" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-outline-primary ml-1" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-outline-primary ml-1" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-outline-primary ml-1" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-outline-primary ml-1" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-outline-primary ml-1" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-outline-primary ml-1" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                            </svg>
                                        </button>
                                        <button class="btn btn-outline-primary ml-1" type="button" data-change="click" data-custom-target="#note-icon">
                                            <svg width="23" class="svg-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label-control">Priority</label>
                                    <div>
                                        <select name="priority" id="" class="form-control" data-change="select" data-custom-target="color">
                                            <option value="primary">Default</option>
                                            <option value="success">Very Low</option>
                                            <option value="info" selected>Low</option>
                                            <option value="warning">Medium</option>
                                            <option value="danger">High</option>
                                            <option value="purple">Very High</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="reset" class="btn btn-outline-primary" data-reset="note-reset">
                                    <svg width="20" class="svg-icon" id="new-note-reset" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
                                    </svg>
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary ml-1">
                                    <svg width="20" class="svg-icon" id="new-note-save" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                                    </svg>
                                    Save
                                </button>
                            </form>
                        </div>
                        <div class="col-md-4" id="default">
                            <div class="card card-block card-stretch card-height card-bottom-border-info note-detail" id="update-note">
                                <div class="card-header d-flex justify-content-between pb-1">
                                    <div class="icon iq-icon-box-2 icon-border-info rounded" id="note-icon">
                                        <svg width="23" class="svg-icon" id="iq-main-01" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="card-header-toolbar d-flex align-items-center">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle dropdown-bg" id="dropdownMenuButton4"
                                                data-toggle="dropdown" aria-expanded="false" role="button">
                                                <i class="ri-more-fill"></i>
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuButton4" style="">
                                                <a href="#" class="dropdown-item new-note1" data-toggle="modal" data-custom-target="#new-note1"><i class="ri-eye-line mr-3"></i>View</a>
                                                <a class="dropdown-item" href="#"><i class="las la-trash-alt mr-3"></i>Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body rounded">
                                    <h4 class="card-title text-ellipsis short-1" id="note-title">Example Note</h4>
                                    <p class="mb-3 text-ellipsis short-6" id="note-description">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex align-items-center justify-content-between note-text note-text-info"> 
                                        <a href="#" class=""><i class="las la-user-friends mr-2 font-size-20"></i>Only Me</a>
                                        <a href="#" class=""><i class="las la-calendar mr-2 font-size-20"></i><span id="note-reminder-date">01 Jan 2021</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  
  </div>



    
    <!-- Wrapper End-->
    <footer class="iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    <span class="text-secondary mr-1"><script>document.write(new Date().getFullYear())</script>©</span> <a href="#" class="">Sticky Note</a>.
                </div>
            </div>
        </div>

    </footer>

</div>

    <!-- Backend Bundle JavaScript -->
    
 

    <script src="jquery-3.6.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <script src="index.js" ></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
    <script src="index1.js" ></script>
    <script src="js/backend-bundle.min.js"></script>
    
    <!-- Flextree Javascript-->
    <script src="js/flex-tree.min.js"></script>
    <script src="js/tree.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="js/table-treeview.js"></script>
    
    <!-- Masonary Gallery Javascript -->
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    
    <!-- Mapbox Javascript -->
    <script src="js/mapbox-gl.js"></script>
    <script src="js/mapbox.js"></script>
        
    <!-- Fullcalender Javascript -->
    <script src='core/main.js'></script>
    <script src='daygrid/main.js'></script>
    <script src='timegrid/main.js'></script>
    <script src='list/main.js'></script>
    
    <!-- SweetAlert JavaScript -->
    <script src="js/sweetalert.js"></script>
    
    <!-- Vectoe Map JavaScript -->
    <script src="js/vector-map-custom.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="js/chart-custom.js"></script>
    
    <!-- slider JavaScript -->
    <script src="js/slider.js"></script>
    
    <!-- app JavaScript -->
    <script src="js/app.js"></script>
    <script src="{{asset('/js/backend-bundle.min.js')}}"></script>
 
    <!-- Flextree Javascript-->
    <script src="{{asset('/js/flex-tree.min.js')}}"></script>
    <script src="{{asset('/js/tree.js')}}"></script>
     
    <!-- Table Treeview JavaScript -->
    <script src="{{asset('/js/table-treeview.js')}}"></script>
     
    <!-- Masonary Gallery Javascript -->
    <script src="{{asset('/js/masonry.pkgd.min.js')}}"></script>
    <script src="{{asset('/js/imagesloaded.pkgd.min.js')}}"></script>
     
    <!-- SweetAlert JavaScript -->
    <script src="{{asset('/js/sweetalert.js')}}"></script>
     
    <!-- Vectoe Map JavaScript -->
    <script src="{{asset('/js/vector-map-custom.js')}}"></script>
     
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('/js/customizer.js')}}"></script>
     
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('/js/chart-custom.js')}}"></script>
     
    <!-- slider JavaScript -->
    <script src="{{asset('/js/slider.js')}}"></script>
     
    <!-- quill Javascript -->
    <script src="{{asset('/js/quill.js')}}"></script>
     
    <!-- app JavaScript -->
    <script src="{{asset('/js/app.js')}}"></script>

  </body>
</html>

