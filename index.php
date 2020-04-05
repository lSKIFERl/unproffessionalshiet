<?php
header('Content-Type:text/html;charset=UTF-8');
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $messages=array();
    $errors = array();
    $values = array();
    if (!empty($_COOKIE['save'])) {
        setcookie('save', '', 100000);
        $messages['save'] = 'Результаты сохранены.';
    }
$errors = FALSE;
$flag=FALSE;
$sverh_separated='';
    $errors['name'] = !empty($_COOKIE['name_error']);
    $errors['email'] = !empty($_COOKIE['email_error']);
    $errors['year'] = !empty($_COOKIE['year_error']);
    $errors['sex'] = !empty($_COOKIE['sex_error']);
    $errors['limbs'] = !empty($_COOKIE['limbs_error']);
    $errors['sverh'] = !empty($_COOKIE['sverh_error']);
    $errors['consent'] = !empty($_COOKIE['consent_error']);
    $errors['biography'] = !empty($_COOKIE['biography_error']);
    if ($errors['name']) {
        if($_COOKIE['name_error']=='none'){
            setcookie('name_error','',100000);
            $messages['name'] = '<div class="error">Введите имя.</div>';
    }
    if($_COOKIE['name_error']=='Unacceptable symbols'){
            setcookie('name_error','',100000);
            $messages['name'] = '<div class="error">Допустима только Латиница и цифры</div>';
    }
}
    if ($errors['email']) {
        if($_COOKIE['email_error']=='none'){
            setcookie('email_error','',100000);
            $messages['email'] = '<div class="error">Введите почту.</div>';
        }
        if($_COOKIE['email_error']=='invalid address'){
            setcookie('email_error','',100000);
            $messages['email'] = '<div class="error">Некорректный адресс почты. Пример:dwarf@erebor.com</div>';
        }
    }
    if($errors['year']){
        setcookie('year_error','',100000);
        $messages['year'] = '<div class="error">Год рождения не указан</div>';
}
    if($errors['sex']){
            setcookie('sex_error','',100000);
            $messages['sex'] = '<div class="error">Пол не указан</div>';
    }
    if ($errors['limbs']) {
        setcookie('limbs_error','',100000);
        $messages['limbs'] = '<div class="error">Количество конечностей не указано</div>';
    }
    if($errors['sverh']){
        if($_COOKIE['sverh_error']=="none"){
            setcookie('sverh_error','',100000);
            $messages['sverh'] = '<div class="error">Способность не выбрана</div>';
        }
        /*if($_COOKIE['sverh_error']=="noneselected"){
            setcookie('sverh_error','',100000);
            $messages['sverh'] = '<div class="error">выбранно none и зачем я его сюда добавил...</div>';
        }*/
    }
    if ($errors['biography']) {
            setcookie('biography_error','',100000);
            $messages['biography'] = '<div class="error">Расскажите о себе!</div>';

    }
    if($errors['consent']){
        setcookie('consent_error','',100000);
        $messages['consent'] = '<div class="error">Продолжить можно лишь при согласии с контрактом</div>';
    }

    $values['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
    $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
    $values['year'] = empty($_COOKIE['year_value']) ? '' : $_COOKIE['year_value'];
    $values['sex'] = empty($_COOKIE['sex_value']) ? '' : $_COOKIE['sex_value'];
    $values['limbs'] = empty($_COOKIE['limbs_value']) ? '' : $_COOKIE['limbs_value'];
    $values['sverh'] = empty($_COOKIE['sverh_value']) ? '' : $_COOKIE['sverh_value'];
    $values['biography'] = empty($_COOKIE['biography_value']) ? '' : $_COOKIE['biography_value'];
    $values['consent'] = empty($_COOKIE['consent_value']) ? '' : $_COOKIE['consent_value'];
include('form.php');
}
else {
    /*Проверяем на ошибки*/
    $errors = FALSE;
    if (empty($_POST['name'])) {
        setcookie('name_error', 'none', time() + 24 * 60 * 60);
        setcookie('name_value', $_POST['name'], time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }
    else {
        if (!preg_match("#^[aA-zZ0-9\-_]+$#",$_POST['name'])){
            setcookie('name_error', 'Unacceptable symbols', time() + 24 * 60 * 60);
            setcookie('name_value', $_POST['name'], time() + 30 * 24 * 60 * 60);
            $errors=TRUE;
        }else{
            setcookie('name_value', $_POST['name'], time() + 30 * 24 * 60 * 60);
        }
    }
    if (empty($_POST['email'])) {
        setcookie('email_error', 'none', time() + 24 * 60 * 60);
        setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }else{
        if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,10})$/i", $_POST['email'])) {
            setcookie('email_error', 'invalid address', time() + 24 * 60 * 60);
            setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
            $errors = TRUE;
        }else{
            setcookie('email_value', $_POST['email'], time() + 30 * 24 * 60 * 60);
        }
    }
    if (empty($_POST['year'])) {
        setcookie('year_error', 'none', time() + 24 * 60 * 60);
        setcookie('year_value', $_POST['year'], time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }else{
        setcookie('year_value', $_POST['year'], time() + 30 * 24 * 60 * 60);
    }
    if (empty($_POST['sex'])) {
        setcookie('sex_error', 'none', time() + 24 * 60 * 60);
        setcookie('sex_value', $_POST['sex'], time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }else{
        setcookie('sex_value', $_POST['sex'], time() + 30 * 24 * 60 * 60);
    }
    if (empty($_POST['limbs'])) {
        setcookie('limbs_error', 'none', time() + 24 * 60 * 60);
        setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }else{
        setcookie('limbs_value', $_POST['limbs'], time() + 30 * 24 * 60 * 60);
    }
    if(!isset($_POST['sverh'])){
        setcookie('sverh_error', 'none', time() + 24 * 60 * 60);
        setcookie('sverh_value', serialize($_POST['sverh']), time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }else{
        $sverh_mass=$_POST['sverh'];
        $flag=FALSE;
        for($w=0;$w<count($sverh_mass);$w++){
            if($sverh_mass[$w]=="net"){
                $flag=TRUE;break;
            }
        }
        if($flag && count($sverh_mass)!=1){
            setcookie('sverh_error', 'noneselected', time() + 24 * 60 * 60);
            setcookie('sverh_value',serialize($_POST['sverh']), time() + 30 * 24 * 60 * 60);
            $errors = TRUE;
        }else{
            setcookie('sverh_value',serialize($_POST['sverh']), time() + 30 * 24 * 60 * 60);
        }
    }
    if (empty($_POST['biography'])) {
        setcookie('biography_error', 'none', time() + 24 * 60 * 60);
        setcookie('biography_value', $_POST['biography'], time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }else{
        setcookie('biography_value', $_POST['biography'], time() + 30 * 24 * 60 * 60);
    }
    if (empty($_POST['consent'])) {
        setcookie('consent_error', 'none', time() + 24 * 60 * 60);
        setcookie('consent_value', $_POST['consent'], time() + 30 * 24 * 60 * 60);
        $errors = TRUE;
    }else{
        setcookie('consent_value', $_POST['consent'], time() + 30 * 24 * 60 * 60);
    }
    if ($errors) {
        header('Location:index.php');
        exit();
    }
    else {
        setcookie('name_error', '', 100000);setcookie('limbs_error', '', 100000);
        setcookie('email_error', '', 100000);setcookie('sverh_error', '', 100000);
        setcookie('year_error', '', 100000);setcookie('biography_error', '', 100000);
        setcookie('sex_error', '', 100000);setcookie('consent_error', '', 100000);
    }

/*запись в бд*/
    if(!empty($_POST['sverh'])){
        $sverh_mass=$_POST['sverh'];
        for($w=0;$w<count($sverh_mass);$w++){
            if($flag){
                if($sverh_mass[$w]!="net")unset($sverh_mass[$w]);
                $sverh_separated=implode(' ',$sverh_mass);
            }else{
                $sverh_separated=implode(' ',$sverh_mass);
            }
        }
    }
$user = 'u17361';
$pass = '1020693';
$db = new PDO('mysql:host=localhost;dbname=u17361', $user, $pass,
array(PDO::ATTR_PERSISTENT => true));
try {
 $stmt = $db->prepare("INSERT INTO application (name, email, birth, sex, limbs,sverh,bio,consent) 
 VALUES (:name, :email, :birth, :sex, :limbs,:sverh,:bio, :consent)");
$stmt->bindParam(':name', $name_db);
$stmt->bindParam(':email', $email_db);
$stmt->bindParam(':birth', $year_db);
$stmt->bindParam(':sex', $sex_db);
$stmt->bindParam(':limbs', $limb_db);
$stmt->bindParam(':sverh', $sverh_db);
$stmt->bindParam(':bio', $bio_db);
$stmt->bindParam(':consent', $consent_db);
$name_db=$_POST["name"];
$email_db=$_POST["email"];
$year_db=$_POST["year"];
$sex_db=$_POST["sex"];
$limb_db=$_POST["limbs"];
$sverh_db=$sverh_separated;
$bio_db=$_POST["biography"];
$consent_db=$_POST["consent"];
$stmt->execute();
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}
setcookie('save', '1');
header('Location: index.php');}
?>