<!--  allsection.php  显示所有小节 -->
<?php require_once '../connections/conn.php';?>
<?php
   /*if(!isset($_SESSION["courseid"]))
        header("location:../selectcourse.php");//判断是否选择课程
    else
        $courseid=$_SESSION["courseid"];*/
    if(isset($_GET['chapterid']))
    {
        $chapterid=$_GET['chapterid'];
    }else
    {
        header("location:chapterlist.php");//判断是否选择课程
    }
MySQLi_query($conn,"set names 'utf8'");
$query_section="select * from section where chapterid=$chapterid";
$section=MySQLi_query($conn,$query_section) or die(mysqli_error($conn));
$row_section=mysqli_fetch_assoc($section);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>所有小节</title>
</head>
<body bgcolor="#f4f4f4">
	<table  border="0" cellspacing="" cellpadding="" width="100%">
              <tr align="center"><td colspan="3"align="left" ><a href="../course/courselist.php">返回课程</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="chapterlist.php">返回大章</a></td></tr>
            <tr><td align="center" colspan="3" height="80"><font color="#1B2AE0" size="7"  >节管理</font></td></tr>    
            <tr height="80"><td align="center" >所有小节</td>
		<td align="center" ><a href="addsection.php">添加小节</a></td>
                <td align="center" ><a href="sectionlist.php">编辑小节信息</a></td>
            </tr>
            <table border="0" align="center"  width="100%"> 
                    <td valign="middle" align="center"><b>节序号</b></td>
                        <td valign="middle" align="center"><b>节名称</b></td>
                    </tr>
                        <?php do{ ?> 
                            <tr valign="middle" align="center"> 
                                <td><?php echo $row_section['number'];?></td>
                               <td><?php echo $row_section['sectionname'];?></td>
                            </tr>

                        <?php }while ($row_section= mysqli_fetch_assoc($section));
                        ?>
                        <tr><td align="right" colspan="3"><a href="addsection.php">继续添加</a></td></tr>
		</table>
	</body>
</html>
