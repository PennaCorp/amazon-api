<?php
    namespace PennaCorp\S3;
    use \Aws\S3\S3Client;
    class PCS3Client{
        private $args;
        public function __construct(array $args = null){
            if ($args == null)
                $args = array();
            if (!isset($args['version']))
                $args['version'] = "latest";
            if (!isset($args['region']))
    		    $args['region'] = "sa-east-1";
            //mysqli_connect(CLIENT_DATABASE_SERVER, CLIENT_DATABASE_USERNAME, CLIENT_DATABASE_PASSWORD, CLIENT_DATABASE);
            if (!isset($args['credentials']['key']) || !isset($args['credentials']['secret'])){
                $con = mysqli_connect(CLIENT_DATABASE_SERVER, CLIENT_DATABASE_USERNAME, CLIENT_DATABASE_PASSWORD, CLIENT_DATABASE);
                $query = "select US_USER, US_SENHA from usuarios where US_TELA='AMAZONEC2'";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_array($result);
                extract($row);
                $args['credentials']['key'] = $US_USER;
                $args['credentials']['secret'] = $US_SENHA;
            }
            $this->args = $args;
        }
        public function getS3Client(){
            $s3Client = new \Aws\S3\S3Client($this->args);
            return $s3Client;
        }
    }
?>
