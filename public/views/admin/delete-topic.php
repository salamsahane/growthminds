<?php

use App\Core\Model;
use App\Models\QueryBuilder;
use App\Utils\Funcs;
use App\Utils\Notify;

$path  = "/admin/course/course-infos/" . $this->view_data['course_id'];

if(!empty($this->view_data['course_id']) && !empty($this->view_data['topic_id'])){

    $topic = Model::find('topic_title', 'topics', 'topic_id', $this->view_data['topic_id']);

    if($topic != null){

        $query = new QueryBuilder;
        $query
            ->delete('topics')
            ->where('topic_id = :topic_id')
            ->setParam('topic_id', $this->view_data['topic_id']);

        $delete = $query->deleteRecord();

        if($delete){
            Notify::success("Topic deleted");
            Funcs::redirect($path);
        }else{
            Notify::danger("Invalid Parameter");
            Funcs::redirect($path);
        }

    }else{
        Notify::danger("Invalid Parameter");
        Funcs::redirect($path);
    }

}else{
    Notify::danger("Invalid Parameter");
    Funcs::redirect($path);
}