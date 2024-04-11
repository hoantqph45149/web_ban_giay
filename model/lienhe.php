<?php
function insert_lienhe($lastname, $firstname, $email, $phonenum, $subject, $note)
{
    $sql = "insert into lienhe(lastname,firstname,email,phone_number,subject_name,note) values('$lastname','$firstname','$email','$phonenum','$subject','$note')";
    pdo_execute($sql);
}
function loadall_lienhe()
{
    $sql = "select * from lienhe"; //order by id desc
    $dslh = pdo_query($sql);
    return $dslh;
}
function delete_lienhe($id)
{
    $sql = "delete from lienhe where id=" . $id;
    pdo_execute($sql);
}
