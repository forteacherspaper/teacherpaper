﻿<!--  deletesection.php  删除小节 -->
<?php require_once('../connections/conn.php'); ?>
<?php require'../connections/course.php';//判断是否用户登陆？ 
?>
<?php
mysqli_query($conn,'set names utf8');
$query_section="select * from section";
$section=mysqli_query($conn,$query_section) or die(mysql_error($conn));
$row_section=mysqli_fetch_assoc($section);//取出一行数据的关联数组（索引数组）
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>删除章节</title>
    <style type="text/css">
        .a{
                font-family: 黑体;
                font-size: 16px;
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
    <table border="0" width="100%">
     
    <table width="100%" border="0" align="center">
        
        <tr>
            <p align="center"><td colspan="5" align="center">
                <font face="隶书" size="+3" color="#000000">组卷系统-章节管理</font></td><td align="right" width="50px" bgcolor=""><font>
                <?php
                echo $_SESSION['username'];
                ?>
                <a class="login" href="../logout.php">【退出】</a><br/>
                <?php
                echo "当前课程：".$coursename;
                ?>
                </font>
            </td></p>
        </tr>
            <br><br>
            <tr><td colspan="5" align="center"><h2>删除页面</h2></td> </tr>
            <tr>
            <td width="15%" height="20" align="left" valign="middle" class="a">
                <a href="../index.php">首页</a>
            </td>
            <td width="15%" height="20%" class="a"><a href="../course/courselist.php">课程管理</a></td>
            <td width="15%" height="20%" class="a"><a href="../chapter/chapterlist.php">课程章节管理</a></td>
            <td width="15%" height="20%" align="left" valign="middle" class="a">
                <a href="../topic/topicmanage.php">题目管理</a>
            </td>
            <td width="15%" height="20%" align="left" valign="middle" class="a">
                <a href="../paper/index.php">组卷系统</a>
            </td>
        </tr>
                <td  valign="middle"  align="center"><b>小节序列</b></td>
                <td  valign="middle" align="center" ><b>小节名称</b></td>
                <td  valign="middle"  align="center"><b>编辑删除</b></td>
            </tr>
            <?php do { ?><tr valign="middle" align="center">
                    <td><?php echo $row_section['number']; ?></td>
		<td><?php echo $row_section['sectionname'] ; ?></td>
		<input type="hidden" name="id" id="id"  value="<?php echo $row_section['id'] ?>">
		<td><a href="editsec.php?id=<?php echo $row_section['id'] ?>" title="editsec.php?id=<?php echo $row_section['sectionname'] ?>">编辑</a>
                    <a href="deletesec.php?id=<?php echo $row_section['id'] ?>" onclick="javascript:return confirm('您确定删除该小节吗？');"title="editsec.php?id=<?php echo $row_section['sectionname'] ?>">删除</a>
		</td>
            </tr>

            <?php }while ($row_section=mysqli_fetch_assoc($section)) ;
             ?> <tr><td width="20%" height="70" align="center" colspan="5" valign="middle"><a href="allsection.php">返回小节序列</a>
                    </td>
                </tr>
		</table>
        <table width="100%" border="0">
                    <hr>
                    <tr>
                        <td align="center" valign="middle">Copyright@2020 组卷系统-题目管理</td>
                    </tr>
                </table> 
	</body>
</html>
