<?php
class ImagesShell extends AppShell {
    public $uses = array('Obra');
    public function main() {
        $this->out('Opcoes disponiveis: ');
        $this->out('create_mini');
    }

    public function create_mini(){
        $obras_path = WWW_ROOT . "img/obras/";
        $mini_path = WWW_ROOT . "img/obras/mini/";

        $limit = 20;
        $n_pages = $this->Obra->find('count') / $limit;
        $n = 0;
        while($n < $n_pages){
            $obras = $this->Obra->find('all', 
                    array("recursive" => -1, 
                        'page' => $n + 1, 
                        'limit' => $limit,
                        'order' => 'id',
                        ));
            foreach($obras as $obra){
                $file_path = $obras_path . $obra['Obra']['imagem'];
                if(file_exists($obras_path . $obra['Obra']['imagem'])){
                    $mini_file_path = $mini_path . $obra['Obra']['imagem'];
                    $this->createThumbnail($file_path, $mini_file_path);
                } else {
                    $this->out("Arquivo inexistente: " . $file_path);
                }
            }
            $n++;
        }

    }

    private function createThumbnail($sTempFileName, $target){
        list($width, $height, $type) = getimagesize($sTempFileName);

        // check for image type
        switch($type) {
            case IMAGETYPE_JPEG:
                $sExt = '.jpg';
                $vImg = imagecreatefromjpeg($sTempFileName);
                break;
            case IMAGETYPE_GIF:
                $sExt = '.gif';
                $vImg = @imagecreatefromgif($sTempFileName);
                break;
            case IMAGETYPE_PNG:
                $sExt = '.png';
                $vImg = imagecreatefrompng($sTempFileName);
                break;
            default:
                $this->out("File error: " . $sResultFileName);
                return;
        }

        // Get the 
        $thumb_w = MINI_IMAGE_WIDTH;
        $thumb_h = $height * MINI_IMAGE_WIDTH / $width;
        // create a new true color image
        $vDstImg = imagecreatetruecolor($thumb_w, $thumb_h);
        if(!$vDstImg) {
            $this->out("Create image error");
            return false;
        }

        imagecopyresampled($vDstImg, $vImg,
                0, 0, 0, 0,
                $thumb_w, $thumb_h,
                $width, $height);

        $sResultFileName = $target;

        // output image to file
        if('.jpg' === $sExt) {
            $iJpgQuality = 90;
            imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
            //@unlink($sTempFileName);
        } else {
            imagepng($vDstImg, $sResultFileName);
        }
    }

}
?>
