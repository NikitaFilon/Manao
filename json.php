<?php

class Json
{

    private $jsonFile = "user.json";

    public function getSingle($login)
    {
        $jsonData = file_get_contents($this->jsonFile);
        $data = json_decode($jsonData, true);
        $singleData = array_filter($data, function ($var) use ($login) {
            return (!empty($var['login']) && $var['login'] == $login);
        });
        $singleData = array_values($singleData);
        return !empty($singleData) ? $singleData : false;
    }


    public function checkPassword($login, $password)
    {
        $jsonData = file_get_contents($this->jsonFile);
        $data = json_decode($jsonData, true);
        $singleData = array_filter($data, function ($var) use ($login) {
            return (!empty($var['login']) && $var['login'] == $login);
        });
        $data = array_values($singleData)[0];
        $salt = $data['salt'];
        $hash = $data['password'];
        $password = md5($salt . $password);
        if ($password == $hash) {
            return $data;
        } else {
            return false;
        }
    }

    public function checkLogin($login)
    {
        $data = $this->getSingle($login);
        if (@$data['login'] == $login) {
            return true;

        } else {
            return false;
        }
    }

    public function checkEmail($user)
    {
        $data = $this->getSingle($user['login']);
        if (@$data['email'] == $user['email']) {
            return true;

        } else {
            return false;
        }
    }

    public function insert($newData)
    {
        if (!empty($newData)) {
            $id = time();
            $newData['id'] = $id;

            $jsonData = file_get_contents($this->jsonFile);
            $data = json_decode($jsonData, true);

            $data = !empty($data) ? array_filter($data) : $data;
            if (!empty($data)) {
                array_push($data, $newData);
            } else {
                $data[] = $newData;
            }
            $insert = file_put_contents($this->jsonFile, json_encode($data));

            return $insert ? $id : false;
        } else {
            return false;
        }
    }
}