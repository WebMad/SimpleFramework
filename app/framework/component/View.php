<?php


namespace app\framework\component;


class View
{
    /**
     * View without template
     *
     * @param $view
     * @param null $data
     * @return bool
     */
    static public function render($view, $data = null)
    {
        if ($data) {
            extract($data);
        }

        $path = APP_DIR . '/app/view/' . $view . '.php';
        if (file_exists($path)) {
            require $path;
            return true;
        }
        return false;
    }

    /**
     * @param $view
     * @param $template
     * @param null $data
     * @return bool
     */
    static public function renderTemplate($view, $template, $data = null)
    {
        if ($data) {
            extract($data);
        }
        $path = APP_DIR . '/app/view/' . $template . '.php';
        if (file_exists($path)) {
            require $path;
            return true;
        }

        return false;
    }

    /**
     * @param $array
     * @return bool
     */
    public function renderJson($array)
    {
        if($content = json_encode($array, JSON_UNESCAPED_UNICODE)){
            echo $content;
            return true;
        }
        return false;
    }
}