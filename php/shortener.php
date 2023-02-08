<?php
class Shortener {
    protected $db;

    public function _construct() {
        $this->db = new MySqli('localhost','root','','website');
    }

    public function generateCode($num) {
        return base_convert($num, 10, 36);
    }

    public function makeCode($url) {
        $url = trim($url);

        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return '';
        }

        $url = $this->db->escape_string($url);

        $exsists = $this->db->query("select code from links where url = '{$url}'");

        if($exsists->num_rows) {
            return $exsists->fetch_object()->code;
        } else {
            $this->db->query("insert into links(url, created) values('{$url}', now())");

            $code = $this->generateCode($this->db->insert_id);

            $this->db->query("update links set code = '{$code}' where url = '{$url}'");

            return $code;
        }
    }

    public function getUrl($code) {
        $code = $this->db->escape_string($code);
        $code = $this->db->query("select url from links where code = '$code'");

        if($code->num_rows) {
            return $code->fetch_object()->url;
        }

        return '';
    }
}
?>