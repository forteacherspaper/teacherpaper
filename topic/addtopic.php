<?php require_once('../connections/conn.php'); ?>
  <?php require'../connections/isrealuser.php';?>
<?php require'../connections/course.php';?>
<?php
/*session_start();
    if(isset($_SESSION["courseid"]))
         $courseid=$_SESSION["courseid"];
    else
        header("location:../selectcourse.php");//判断是否选择课程
        */
date_default_timezone_set('prc');
$data=date('Y-m-d H:i:s',time());
mysqli_query($conn,"set names 'utf8'");
$query_Topic="select username from question";
$Topic=mysqli_query($conn,$query_Topic) or die(mysqli_error($conn));
$row_Topic=mysqli_fetch_assoc($Topic) ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>添加题目</title> 
    <meta http-equiv="content-type" content="text/html;charset=gb2312">
        <script language="javascript" src="ajax.js"></script>
        <script language="javascript">
        function query(){
        var pid = document.getElementById("bigClassName").value;
        if(pid!=""){
           createRequest('query.php?pid='+pid);
        }
        }
        </script>
    <style type="text/css">
       .a{
                font-family: 黑体;
                font-size: 16px;
                background-color:aliceblue;
                text-decoration: none;
                background-color: #ced1f2;
            }
            body{
                background: aliceblue;
                text-decoration: none;
            }
             a:link{
                 text-decoration: none;
                 color:#000000;
            
            }
            a:visited{
                color:#000000;
             }
             a:hover{
                color:#000000;
             }
             a:active{
                color:#000000;
             }

    </style>
</head>
<body bgcolor="#f4f4f4">
    <table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
        
        <tr>
            <td></td>
            <p align="center"><td colspan="4" align="center">
                <font face="隶书" size="+3" color="#000000">题目管理-添加题目</font>
            </td></p>
            <td><div>
            <p align="right"><font>
               <?php
                echo $_SESSION['username'];
                ?>
                <a class="login" href="../logout.php">【退出】</a><br/>
                <?php
                echo "当前课程：".$coursename;
                ?>
               
                </p>
            </div></td>
        </tr>
        
       <tr>
            <td width="15%" height="40px" align="center" class="a"><a href="../index.php">首页</a> </td>
            <td width="15%" height="40px" class="a" align="center"><a href="../teacher/teachermanage.php">教师管理</a></td>
            <td width="15%" height="40px" class="a"align="center"><a href="../course/courselist.php">课程管理</a></td>
            <td width="15%" height="40px" class="a" align="center"><a href="../chapter/chapterlist.php">章节管理</a></td>
            <td width="15%" height="40px" class="a" align="center"><a href="topicmanage.php">题目管理</a></td>
            <td width="15%" height="40px"  class="a" align="center"> <a href="../paper/paperlist.php">组卷系统</a></td>
        </tr>
        <tr><table><hr></table></tr>
        <tr>
            <td height="169" colspan="6" align="center">
                <form id="forml" name="forml" method="post" action="addsuccess.php">
                    <table width="100%" border="0" align="center">
                        <tr><td height="68" colspan="4" align="center"><h2>添加题目信息</h2></td></tr>
                        <tr>
                            <td width="40%" align="right" valign="middle"></td>
                            <td align="left" valign="middle">
                                <form action="" name="class" method="get" >
                                <select name="bigClassName" id="bigClassName" Onchange="query()">
                                <option value="">--选择章--</option>
                                <?php
                                //$link=mysql_connect("localhost","root","");
                             //   mysql_select_db("paper1") or die("没有此数据库！");
                                $sql="select id,chaptername from chapter where courseid=$courseid";
                                mysqli_query($conn,"set names 'utf8'");
                                $res=mysqli_query($conn,$sql);
                                while($result=mysqli_fetch_assoc($res)){
                                   echo "<option value='".$result["id"]."'>".$result["chaptername"]."</option>";
                                }
                                ?>
                                </select>
                                &nbsp;
                                <select name="smallClassName" id="smallClassName">
                                <option value="">--选择节--</option>
                                </select>
                                </form></td>
                        </tr>
                        <tr>
                            <td width="40%" align="right" valign="middle">题干:</td>
                            <td align="left" valign="middle">
                                <textarea rows="5" cols="70" id="question" name="question"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" align="right" valign="middle">题型:</td>
                            <td align="left" valign="middle">
                                <select id="questiontype" name="questiontype">
                                    <option value="单选题" checked="checked">单选题</option>
                                    <option value="多选题">多选题</option>
                                    <option value="填空题">填空题</option>
                                    <option value="计算题">计算题</option>
                                    <option value="应用题">应用题</option>
                                    <option value="连线题">连线题</option>
                                    <option value="判断题">判断题</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" align="right" valign="middle">答案:</td>
                            <td align="left" valign="middle"><textarea rows="5" cols="70" id="answer" name="answer"></textarea></td></tr>
                        <!-- <tr>
                            <td width="40%" align="right" valign="middle">出题人:</td>
                            <td align="left" valign="middle"><input name="username" type="text" id="username" size="20" value="<?php //session_start(); echo $_SESSION['username'];?>" /></td>
                        </tr>-->
                        <tr>
                            <td colspan="2" align="center" valign="middle"><input type="submit" name="submit" value="提交"
                                url="topicmanage.php"/></td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="6"><table align="center">
                <hr>
                <tr>
                    <td align="center" valign="middle">Copyright@2020 组卷系统-教师管理</td>
                </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
