   <?php require'../connections/isrealuser.php';?>
   <?php require'../connections/course.php';?>
   <?php
    date_default_timezone_set('prc');
    $data = date('Y-m-d H:i:s',time());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html"  charset="utf-8"/>
    <title>新增课程</title>
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
    <table width="100%" border="0" align="center">
        <div id="head">
            <p align="right"><font>
                <?php
                echo $_SESSION['username'];
                ?>
                <a class="login" href="../logout.php">【退出】</a><br/>
                <?php
                echo "当前课程：".$coursename;
                ?>
                </font></p>
            </div>
        <tr height="100">
           <p align="center"> <td align="center" colspan="6" ><font face="隶书" size="+5" color="#000000">组卷系统-课程管理</font></td></p></tr> 

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
                    
        <tr>
            <td height="169" colspan="5" align="center">
                <form id="form1" name="form1" method="post" action="insertSuccess.php">
                    <table width="100%" border="0" align="center">
                        <tr align="right"><td width="40%" colspan="5" class="a">插入课程</td></tr>
                        
                        <tr>
                            <td width="40%" align="right" valign="middle" colspan="5" class="a">课程名称:</td>
                            <td align="left" valign="middle"><input name="CourseName" type="text" id="CourseName"></td>
                        </tr>
                        
                        <tr>
                            <td colspan="6" align="center" valign="middle"><input type="submit" name="submit" value="提交"/></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="6"><table align="center">
                <hr>
                <tr>
                    <td align="center" valign="middle">Copyright@2020 组卷系统—教师管理</td>
		</tr>
                </table>
            </td>
        </tr>
    </table>
</body>

