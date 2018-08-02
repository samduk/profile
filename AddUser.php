<?php
include './autoload.php';

if(isset($_GET['id'])){
    $user = new User();
    $ub = $user->getUser($_GET['id']);
}

if(count($_REQUEST) > 0 && isset($_REQUEST['submit'])){

    // Check for secutiry
    BasicSecurity::restrictMysqlInjection(Database::getInstance(),$_REQUEST);



    // Fill the bean with the data that has been submitted via tha form
    $userBean = new UserBean();
    (isset($_REQUEST['id']))?$userBean->setId($_REQUEST['id']):$userBean->setId('');// id if edit request
    $userBean->setFname($_REQUEST['fname']);
    $userBean->setLname($_REQUEST['lname']);
    $userBean->setUsername($_REQUEST['username']);
    $userBean->setGender($_REQUEST['gender']);
    (isset($_REQUEST['password']))?$userBean->setPassword(md5($_REQUEST['password'])):'';// pass if add request



    // Add/Update the user
    $user = new User;
    if($user->createUser($userBean)){
        echo "<script>alert('User updated Successfully')</script>";
        echo "<script>window.location='index.php'</script>";
    }
}
?>
<html>
    <head>
        <script type="text/javascript" src="" ></script>
    </head>
    <body>
        <form name="adduserform" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" value="<?php echo (null !== $ub->getId())?$ub->getId():"" ?>" />
            <p>First Name <input type="text" name="fname" id="fname" value="<?php echo (null !== $ub->getFname())?$ub->getFname():"" ?>"></p>
            <p>Last Name <input type="text" name="lname" id="lname" value="<?php echo (null !== $ub->getLname())?$ub->getLname():"" ?>"></p>
            <p>Username <input type="text" name="username" id="username" value="<?php echo (null !== $ub->getUsername())?$ub->getUsername():"" ?>"></p>
            <?php if(!isset($_GET['id'])) {?>
                <p>Password <input type="password" name="password" id="password" value=""></p>
            <?php } ?>
            <p>Gender <select name="gender" id="gender">
                    <option <?php echo ((null !== $ub->getGender()) && ($ub->getGender() == 'M'))?'Selected':"" ?>>M</option>
                    <option <?php echo ((null !== $ub->getGender()) && ($ub->getGender() == 'F'))?'Selected':"" ?>>F</option>
                </select>
            </p>
            <p><input type="submit" name="submit" id="submit" value="Submit"></p>
        </form>
    </body>
</html>
