<?php
/**
 * Created by PhpStorm.
 * User: magicninja
 * Date: 04.07.2018
 * Time: 16:09
 */

namespace models;
use components\Db;
use PDO;

class News
{
    public static function getNewsItemByID($id)
    {
        $id = intval($id);

        if ($id) {

        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM news WHERE id=' . $id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $newsItem = $result->fetch();

        return $newsItem;
        }

    }

    public static function getNewsList()
    {
        $db = Db::getConnection();
        $newsList = array();

        $result = $db->query('SELECT id, title, date, author_name, short_content FROM news ORDER BY id ASC LIMIT 10');

        $i = 0;
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }

}