<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php require_once 'include.php';AdminCheck();?>
<html>
<head >
    <title>CRAZY HATS</title>
    <link rel="stylesheet" href="../css/style2.css" type="text/css" />
    <script src="../js/Validation.js" type="text/javascript"></script>
    <script src="../js/Common.js" type="text/javascript"></script>
    <script type="text/javascript">
        function save(){
            if(!validation()){
				return false;
            }
            return true;
        }
    </script>
    <style type="text/css">
.submit_btn { 
	padding: 5px 12px; 
	text-align: center; 
	text-decoration: none; 
	font-weight: bold;
	background-color: #404040; 
	border: 1px solid #fff; 
	color: #fff; 
	font-size:12px; 
	cursor: pointer;
}
</style>
</head>
<body>
<div id="content" class="float_r">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						
						<td style="width:5px" valign="bottom" class="navigation">&nbsp;
							
						</td>
						<td valign="bottom" class="navigation">
                            Category Management--Add Category
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>

<form id="editForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tr><p></p>
                        <td>
						    <table width="100%" border='0' cellpadding="0" cellspacing="0">
							    
                              <tr>
									<td class="typeField" height="30"  >
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							     	<span>Category Title:</span>
                                    </td>
                                    <td class="typeField"  height="30"  style="width:80%" >
							     	<input type="text" id="txtEditTitle" name="txtEditTitle"
                                     validate="required" maxlength="50" class="text300"/>
                                    <font color="red">*</font>
                                    <font id="txtEditTitleError" color="red"></font>
					          	   </td>
					         </tr>
								<tr>
									<td style="height:26px" >
                             			<input  type="submit" id="btnSave" name="btnSave" class="submit_btn" onsubmit="return save()" value="Save"/>
									</td>
							  </tr>
                            </table>
                        </td>
					</tr>
			  </table>
			</td>
		</tr>
    </table>
    <input id="author_id" type="hidden" value=""  />
    </form>
     </div>
</body>
</html>

<?php
if(isset($_POST['btnSave']))
{
	$service = new CategoryService();
	$sql = ' insert into category ';
	$title = $_POST["txtEditTitle"];
	$dataArray = array("category_title"=>"'".$title."'");
	$sql.=$service->GetInsertSQL($dataArray);
	$id = $service->save($sql);
	if($id!=0){
		alertRedirect(true,'DisplayCategory.php');
	}else{
	alertRedirect(false,'DisplayCategory.php');
	}
}

?>