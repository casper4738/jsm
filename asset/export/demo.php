<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HTML table Export</title>

	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="tableExport.js"></script>
	<script type="text/javascript" src="jquery.base64.js"></script>
	<script type="text/javascript" src="html2canvas.js"></script>
	<script type="text/javascript" src="jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="jspdf/jspdf.js"></script>
	<script type="text/javascript" src="jspdf/libs/base64.js"></script>
	
		<script type="text/javaScript">	
		$(document).ready(function(){		
		});
	</script>
	
	
    <body class="skin-black">
	
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
	
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        HTML Table Export
                        <small>jquery Plugin</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li>My jQuery Plugin</li>
                        <li class="active">tableExport</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
						
                        <div class="col-md-12">
						
                            <div class="box">
					
                                <div class="box-body table-responsive" id='ptable'>
								<h3>Demo</h3>	
<div class="btn-group">
							<button class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
							<ul class="dropdown-menu " role="menu">
								<li><a href="#" onClick ="$('#customers').tableExport({type:'json',escape:'false'});"> <img src='icons/json.png' width='24px'> JSON</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"> <img src='icons/json.png' width='24px'> JSON (ignoreColumn)</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'json',escape:'true'});"> <img src='icons/json.png' width='24px'> JSON (with Escape)</a></li>
								<li class="divider"></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'xml',escape:'false'});"> <img src='icons/xml.png' width='24px'> XML</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'sql'});"> <img src='icons/sql.png' width='24px'> SQL</a></li>
								<li class="divider"></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'csv',escape:'false'});"> <img src='icons/csv.png' width='24px'> CSV</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'txt',escape:'false'});"> <img src='icons/txt.png' width='24px'> TXT</a></li>
								<li class="divider"></li>				
								
								<li><a href="#" onClick ="$('#customers').tableExport({type:'excel',escape:'false'});"> <img src='icons/xls.png' width='24px'> XLS</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'doc',escape:'false'});"> <img src='icons/word.png' width='24px'> Word</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'powerpoint',escape:'false'});"> <img src='icons/ppt.png' width='24px'> PowerPoint</a></li>
								<li class="divider"></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'png',escape:'false'});"> <img src='icons/png.png' width='24px'> PNG</a></li>
								<li><a href="#" onClick ="$('#customers').tableExport({type:'pdf',escape:'false'});"> <img src='icons/pdf.png' width='24px'> PDF</a></li>
								
								
							</ul>
						</div>								
                                   <table id="customers" class="table table-striped" >
				<thead>			
					<tr class='warning'>
						<th>Country</th>
						<th>Population</th>
						<th>Date</th>
						<th>%ge</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Chinna</td>
						<td>1,363,480,000</td>
						<td>March 24, 2014</td>
						<td>19.1</td>
					</tr>
					<tr>
						<td>India</td>
						<td>1,241,900,000</td>
						<td>March 24, 2014</td>
						<td>17.4</td>
					</tr>
					<tr>
						<td>United States</td>
						<td>317,746,000</td>
						<td>March 24, 2014</td>
						<td>4.44</td>
					</tr>
					<tr>
						<td>Indonesia</td>
						<td>249,866,000</td>
						<td>July 1, 2013</td>
						<td>3.49</td>
					</tr>
					<tr>
						<td>Brazil</td>
						<td>201,032,714</td>
						<td>July 1, 2013</td>
						<td>2.81</td>
					</tr>
				</tbody>
			</table> 
			<div>
</html>