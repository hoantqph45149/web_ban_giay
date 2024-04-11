<?php
function insertTaiKhoan($username ,$fullname , $phone_number, $email, $address, $password)
{
    $sql = "INSERT INTO taikhoan(username,fullname,email,phone_number, address, password) VALUES('{$username}','{$fullname}','{$email}','{$phone_number}', '{$address}','{$password}')";
    pdo_execute($sql);
}

function insertTaiKhoan_tv($username ,$fullname , $phone_number, $email, $address, $password, $role_id)
{
    $sql = "INSERT INTO taikhoan(username,fullname,email,phone_number, address, password, role_id) VALUES('{$username}','{$fullname}','{$email}','{$phone_number}', '{$address}','{$password}', '{$role_id}')";
    pdo_execute($sql);
}


function getUser($username, $password)
{
    $sql = "SELECT * FROM taikhoan WHERE username = '{$username}' AND password = '{$password}'";
    $data = pdo_query_one($sql);
    return $data;
}

function loadone_tv($id){
    $sql = "SELECT * FROM taikhoan WHERE id ='{$id}'";
    $one_tv = pdo_query_one($sql);
    return $one_tv;
}

function update_tv($id, $username, $fullname, $phone_number, $email, $address, $password)
{
    $sql = "UPDATE taikhoan SET username = '{$username}', fullname = '{$fullname}' ,  password = '{$password}', email = '{$email}', address = '{$address}', phone_number = '{$phone_number}' WHERE id = '{$id}'";
    pdo_execute($sql);
}

function checkEmail($email)
{
    $sql = "SELECT * FROM taikhoan WHERE email = '{$email}'";
    $user = pdo_query_one($sql);
    return $user;
}

function loadAllTaiKhoan_tv()
{
    $sql = "SELECT * FROM taikhoan where role_id = 1";
    $listTaiKhoan_tv = pdo_query($sql);
    return $listTaiKhoan_tv;
}

function loadAllTaiKhoan_user()
{
    $sql = "SELECT * FROM taikhoan where role_id = 0 ";
    $listTaiKhoan_user = pdo_query($sql);
    return $listTaiKhoan_user;
}

function deleteTaiKhoan($id) {
    $sql = "DELETE FROM taikhoan WHERE id = '{$id}'";
    pdo_execute($sql);
}