<?php
include("config.php");
mysqli_set_charset($conn,'utf8');
$querymsg ="";$errors = array();$datacount=0;
if (isset($_POST["submit_form"])) 
{
	//checking language
			$lang = $_POST["lang"];
			if(isset($_POST["lang"])  && $_POST["lang"]!='')
			{
				if(isset($_FILES['filename']['tmp_name'])  && $_FILES['filename']['tmp_name']!='')
				{
			
					//check file is excel
					$mimes = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','text/xls','text/xlsx'];
					$allowedExts = ['xls', 'xlsx'];
					$extension = pathinfo($_FILES["filename"]["name"], PATHINFO_EXTENSION);
			
					if (in_array($_FILES['filename']['type'], $mimes) && in_array($extension, $allowedExts))
					{
						require_once ('./vendor/autoload.php');					
						$targetPath = 'uploads/' . $_FILES['filename']['name'];
						move_uploaded_file($_FILES['filename']['tmp_name'], $targetPath);
						
						//reading spreadsheet
						$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
						$spreadSheet = $Reader->load($targetPath);
						$excelSheet = $spreadSheet->getActiveSheet();
						$spreadSheetAry = $excelSheet->toArray();
						$sheetCount = count($spreadSheetAry); 
					
						for ($i = 0; $i <= $sheetCount; $i ++) 
						{
							$lang_id = "";
							if (isset($spreadSheetAry[$i][0])) {
								$lang_id = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
								}
						
							$language = "";
							if (isset($spreadSheetAry[$i][1])) {
								$language = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
								}
							//skip Title in excel sheet
							if($i != 0)
								{
									if (!empty($language) || ! empty($lang_id)) 
									{
											if(is_numeric($lang_id))
											{
												if($lang == 'english') { $telugu="";$hindi=""; $english=$language; }
												if($lang == 'telugu') { $english="";$hindi="";$telugu=$language; }
												if($lang == 'hindi') { $telugu="";$english=""; $hindi=$language;}
										
												$check = "select * from languages where lang_id ='" . $lang_id."'";//echo $check;exit;
												$check = mysqli_query($conn, $check);
												$num = mysqli_num_rows($check);
												if($num ==0)
												{
													$query = "insert into languages(lang_id,english,hindi,telugu) values('" . $lang_id . "','" . $english . "','" . $hindi . "','" . $telugu . "')";
													$result = mysqli_query($conn, $query);
												}
												else
												{
													if($lang == 'english') { 
													$query = "update languages set english ='" .$english. "' where lang_id=" . $lang_id;
													}
													if($lang == 'telugu') {
														 $query = "update languages set telugu='" . $telugu. "' where lang_id=" . $lang_id;
													}
													if($lang == 'hindi') { 
													$query = "update languages set hindi='". $hindi. "' where lang_id=" . $lang_id;
													}
													$result = mysqli_query($conn, $query);
										
												}
												if($result)
												{
													$querymsg = "<b><p style='color:green'>Uploaded Successfully</p></b></br></br>";
												}
												else
												{
													echo "<b><p style='color:red'>There was problem with upload.Please try again</p></b></br></br>";
												}
											}
											else
											{
												echo "<b><p style='color:red'>First column data must be number(Language ID) in Excel sheet</p></b></br></br>";break;
											}
									
									} 
									else 
									{
										++$datacount;
									}
								}							
					
						}
						//checking file is empty(First column not considered(takes as Title))
						if($sheetCount ==( $datacount) )
						{
							echo "<b><p style='color:red'>Excel file is empty</p></b></br></br>";
						}
					}
					else
					{
						echo "<b><p style='color:red'>Excel file only allowed(.xls/.xlsx)</p></b></br></br>";
					}	
				}
				else
				{
					echo "<b><p style='color:red'>No file selected</p></b></br></br>";
				}
			}
			else 
			{
				echo "<b><p style='color:red'>Select one language</p></b></br></br>";
			}
}
echo $querymsg;

?>