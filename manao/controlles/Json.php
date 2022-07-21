<?php


class Json
{

    private $jsonFile = "data/user.json";

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

    public function delete($login)
    {
        $jsonData = file_get_contents($this->jsonFile);
        $data = json_decode($jsonData, true);

        $newData = array_filter($data, function ($var) use ($login) {
            return ($var['$login'] != $login);
        });
        $delete = file_put_contents($this->jsonFile, json_encode($newData));
        return $delete ? true : false;
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

    public function checkLogin($user)
    {
        $data = $this->getSingle($user->getLogin());

        return !empty($data) ? true : false;
    }

    public function checkEmail($user)
    {
        $jsonData = file_get_contents($this->jsonFile);
        $data = json_decode($jsonData, true);
        $singleData = array_filter($data, function ($var) use ($user) {
            return (!empty($var['email']) && $var['email'] == $user->getEmail());
        });
        $singleData = array_values($singleData);
        return !empty($singleData) ? true : false;

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