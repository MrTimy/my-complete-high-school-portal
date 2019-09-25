<?php 
require ('../../../php.files/classes/pdoDB.php');
require ('../../../php.files/classes/kas-framework.php');
require (constant('tripple_return').'php.files/classes/students.php');
$kas_framework->safesession();
$kas_framework->checkAuthStudent();
require (constant('tripple_return').'php.files/classes/generalVariables.php');
require (constant('tripple_return').'php.files/student_details.php');		
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Tools</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel="shortcut icon" type="image/x-icon" href="<?php print $kas_framework->school_utility_image('badge') ?>" />
        <!-- bootstrap 3.0.2 -->
        <link href="<?php print constant('tripple_return') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php print constant('tripple_return') ?>css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php print constant('tripple_return') ?>css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?php print constant('tripple_return') ?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="<?php print constant('tripple_return') ?>css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php print constant('tripple_return') ?>css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="myjs/html5shiv.js"></script>
          <script src="myjs/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
	
	<?php require (constant('double_return').'inc.files/header.php') ?>
	<p style="margin-top:18px">&nbsp;</p>
	<div class="wrapper row-offcanvas row-offcanvas-left">
	<?php require (constant('double_return').'inc.files/sidebar.php') ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <i class="fa fa-th-large text-ult_brown"></i> My Tools <?php $student->display_accessLevel(); ?>  </h1>
                    <ol class="breadcrumb">
						<li class="click_ult"><a href="<?php print constant('single_return') ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
						<li class="active"><i class="fa fa-th-large"></i> My Tools</li>
                    </ol>
                </section>

			 <!-- Main content -->
                <section class="content">
		<?php $student->checkBasicPlanStudent(); //$student->authConfirm($useradmitStatus); ?>
				
			<h2><?php $kas_framework->displaySchoolLogo('50', 'circle', '0 5px 0 0');
				$kas_framework->displayUserSchool($userschool); ?></h2>
            <h4>Currrent Year: 
			<?php print $kas_framework->getValue('school_years_desc', 'school_years', 'school_years_id', $kas_framework->getValue('current_year', 'tbl_config', 'id', '1')); ?>
			 &raquo; <?php print $kas_framework->getValue('grades_desc', 'grades', 'grades_id', $user_student_grade_year_grade_id); ?>
			 &raquo; <?php print $kas_framework->getValue('grade_terms_desc', 'grade_terms', 'current', '1'); ?>
			</h4>
                    <!-- Small boxes (Stat box) $user_student_grade_year_grade_id -->
                    <div class="row">
                        <div class="ultimrap">
                            <!-- small box -->
                            <div class="small-box bg-paleyellow">
                                <div class="inner">
                                    <h2>
                                       <a href="notepad/"><font color='black'> My Notepad </font></a>
                                    </h2>
                                    <p>
                                      <font color='black'> Create and Organize Note</font>
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-tablet"></i>
                                </div>
                                <a href="notepad/" class="small-box-footer click_ult">
                                   <font color='black'> Open Application </font><i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="ultimrap">
                            <!-- small box -->
                            <div class="small-box bg-maroon">
                                <div class="inner">
                                    <h2>
                                        My Calendar
                                    </h2>
                                    <p>
                                       Set Reminder and Events
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <a href="calendar/" class="small-box-footer click_ult">
                                    Open Application <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                        <div class="ultimrap">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h2>
                                        My Timeline
                                    </h2>
                                    <p>
                                        View all Your Activities in Time
									</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-book"></i>
                                </div>
                                <a href="timeline/" class="small-box-footer click_ult">
                                    Open Aplication <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						 <div class="ultimrap">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h2>
                                        Transcript
                                    </h2>
                                    <p>
                                        Request your Transfer Certificate
									</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-send"></i>
                                </div>
                                <a href="transcript/" class="small-box-footer click_ult">
                                    Open Aplication <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						<div class="ultimrap">
                            <!-- small box -->
                            <div class="small-box bg-navy">
                                <div class="inner">
                                    <h2>
                                       <font color='white'>Class Gallery</font>
                                    </h2>
                                    <p>
                                       <font color='white'>view your class gallery</font>
									</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-picture-o"></i>
                                </div>
                                <a href="classgallery/" class="small-box-footer click_ult">
                                    <font color='white'>Open Aplication</font> <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
						
                        <div class="ultimrap">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h2>
                                       <a href="./academics/schooltimetable/"> <font color='white'>My Timetable</font></a>
                                    </h2>
                                    <p>
                                        View Your Timetable
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-table"></i>
                                </div>
                                <a href="." class="small-box-footer click_ult">
                                    Open Application <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->

                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-12 connectedSortable">
                            
                        </div><!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section style="margin:16px"> 
                            <!-- Box (with bar chart removed) -->
							
							<!-- Custom tabs (Charts with tabs removed)-->
                                                
                            <!-- Calendar -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <i class="fa fa-calendar"></i>
                                    <div class="box-title">School Calendar</div>
                                    
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <!-- button with a dropdown -->

                                    </div><!-- /. tools -->                                    
                                </div><!-- /.box-header -->
                                <div class="box-body no-padding">
                                    <!--The calendar -->
                                    <div id="calendar"></div>
                                </div><!-- /.box-body -->
							</div><!-- /.box -->

                            <!-- quick email widget removed -->
                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Map box removed -->
							<!-- Chat box removed -->
							<!-- TO DO List removed -->
						</section><!-- right col -->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <script src="<?php print constant('tripple_return') ?>myjs/jquery.min.js"></script>
        <!---- my javascript controller -->
        <script src="<?php print constant('tripple_return') ?>myjs/feccukcontroller.js" type="text/javascript"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="<?php print constant('tripple_return') ?>js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="<?php print constant('tripple_return') ?>js/bootstrap.min.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="<?php print constant('tripple_return') ?>js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php print constant('tripple_return') ?>js/AdminLTE/app.js" type="text/javascript"></script>

		<?php include (constant('tripple_return').'inc.files/schoolCalendarPlugin.php') ?>
		<?php include (constant('tripple_return').'inc.files/fixedfooter.php') ?>
    </body>
</html>