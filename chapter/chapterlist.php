<!--  chapterlist.php  编辑章节列表 -->
<?php require_once('../connections/conn.php'); //连接数据库 
?>
<?php require'../connections/isrealuser.php';//判断是否用户登陆？ 
?>
<?php
    if(isset($_SESSION["courseid"]))
    {
       $courseid=$_SESSION["courseid"];
    }
    else
    {
       header("location:../selectcourse.php");//判断是否选择课程
    }
mysqli_query($conn,'set names utf8');
$query_Chapter="select * from chapter where courseid=$courseid";
$Chapter=mysqli_query($conn,$query_Chapter) or die(mysqli_error($conn));
$row_Chapter=mysqli_fetch_assoc($Chapter);//取出一行数据的关联数组（索引数组）
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>编辑章节页面</title>
    <style type="text/css">
        .a{
                font-family: 黑体;
                font-size: 25px;
                background-color:aliceblue;
                text-decoration: none;
            }
            body{
                background: aliceblue;
                text-decoration: none;
            }
            a:link{
                 text-decoration: none;
            }
    </style>
</head>
<body bgcolor="#f4f4f4">
<table border="0"  width="100%">
   <div id="head">
            <p align="right"><font>
                <?php
                echo $_SESSION['username'];
                ?>
                <a class="login" href="../logout.php">【退出】</a></font></p>
            </div>
                <tr height="10">
          <p align="center">  <td align="center" colspan="6" height="10%"><font face="隶书" size="+5" color="#cccc00">组卷系统-章管理</font></td></p></tr> 
    <tr>
            <td width="15%" height="20" align="center" class="a">
                <a href="../index.php">首页</a>
            </td>
            <td width="15%" height="20%" class="a"><a href="../course/courselist.php">课程管理</a></td>
            <td width="15%" height="20%" class="a"><a href="../chapter/chapterlist.php">课程章节管理</a></td>
            <td width="15%" height="20%" align="center" valign="middle" class="a">
                <a href="../topic/topicmanage.php">题目管理</a>
            </td>
            <td width="15%" height="20%" align="center" valign="middle" class="a">
                <a href="../paper/index.php">组卷系统</a>
            </td>
            <tr><td><br></td></tr>
        </tr>
        <tr align="center"><td colspan="6"align="center" height="10%">  <a href="../index.php">返回网站首页</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="../course/courselist">返回课程</a></td></tr>
        <tr height="70"> 
        </tr>
            <tr>
                <td  valign="middle"  align="center"><b>章号</b></td>
                <td  valign="middle" align="center" ><b>章名称</b></td>
                <td  valign="middle"  align="center"><b>操作</b></td>
                <td  valign="middle"  align="center"><b>添加章</b></td>
                <td  valign="middle"  align="center"><b>编辑章</b></td>
                <td  valign="middle"  align="center"><b>章目录</b></td>
               
            </tr>
            <?php do { ?>
            <tr valign="middle" align="center">
                <td><?php echo $row_Chapter['number']; ?></td>
                <td><a href="allsection.php"><?php echo $row_Chapter['chaptername'] ; ?></a></td>
		        <input type="hidden" name="id" id="id" value="<?php echo $row_Chapter['id'] ?>">
		        <td width="25%">
                    <a href="editOr.php?id=<?php echo $row_Chapter['id'] ?>" title="editOr.php?id=<?php echo $row_Chapter['id'] ?>">编辑&nbsp;&nbsp;&nbsp;
                    </a>
                    <a href="deleteOr.php?id=<?php echo $row_Chapter['id'] ?>" title="deleteOr.php?id=<?php echo $row_Chapter['id'] ?>" onclick="javascript:return confirm('您确定删除该章吗？');" >删除
                        &nbsp;&nbsp;&nbsp;
                    </a>
                    <a href="addsection.php?chapterid=<?php echo $row_Chapter['id'] ?>" title="addsection.php?chapterid=<?php echo $row_Chapter['id'] ?>">添加节</a>&nbsp;&nbsp;&nbsp;
                    <a href="allsection.php?chapterid=<?php echo $row_Chapter['id'] ?>" title="allsection.php?chapterid=<?php echo $row_Chapter['id'] ?>">显示节序列</a></td>
                    <td align="center" width="15%"><a href="addchapter.php"><font color="#1B2AE0" size="4"  >添加章</font></a></td> 
                    <td align="center" width="15%"><a href="chapterlist.php"><font color="#1B2AE0" size="4"  >编辑章信息</font></a></td>
                    <td align="center" width="15%"><a href="allchapter.php"><font color="#1B2AE0" size="4"  >章目录</font></a></td>
            </tr>
            <?php }while ($row_Chapter=mysqli_fetch_assoc($Chapter)) ;
            ?>
	</table>  
        </table>
        <table width="100%" border="0">
                    <hr>
                    <tr>
                        <td align="center" valign="middle">Copyright@2020 组卷系统-题目管理</td>
                    </tr>
                </table> 
    </body>
</html>
