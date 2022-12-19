<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use App\Http\Requests\ArticleRequest;

class ArticleCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkCloneOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\BulkDeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\FetchOperation;

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel(\App\Models\Article::class);
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article');
        $this->crud->setEntityNameStrings('article', 'articles');

        /*
        |--------------------------------------------------------------------------
        | LIST OPERATION
        |--------------------------------------------------------------------------
        */
        $this->crud->operation('list', function () {
            $this->crud->addColumn('title');
            $this->crud->addColumn([
                'name' => 'date',
                'label' => 'Date',
                'type' => 'date',
            ]);
            $this->crud->addColumn('status');
            $this->crud->addColumn([
                'name' => 'featured',
                'label' => 'Featured',
                'type' => 'check',
            ]);
            $this->crud->addColumn('tags');

            $this->crud->addFilter([ // select2_multiple filter
                'name' => 'tags',
                'type' => 'select2_multiple',
                'label'=> 'Tags',
            ], function () {
                return \App\Models\Tag::all()->keyBy('id')->pluck('name', 'id')->toArray();
            }, function ($values) { // if the filter is active
                $this->crud->query = $this->crud->query->whereHas('tags', function ($q) use ($values) {
                    foreach (json_decode($values) as $key => $value) {
                        if ($key == 0) {
                            $q->where('tags.id', $value);
                        } else {
                            $q->orWhere('tags.id', $value);
                        }
                    }
                });
            });
        });

        /*
        |--------------------------------------------------------------------------
        | CREATE & UPDATE OPERATIONS
        |--------------------------------------------------------------------------
        */
        $this->crud->operation(['create', 'update'], function () {
            $this->crud->setValidation(ArticleRequest::class);

            $this->crud->addField([
                'name' => 'title',
                'label' => 'Заголовок',
                'type' => 'text',
                'placeholder' => 'Your title here',
            ]);
            $this->crud->addField([
                'name' => 'slug',
                'label' => 'Slug (URL)',
                'type' => 'text',
                'hint' => 'Will be automatically generated from your title, if left empty.',
                // 'disabled' => 'disabled'
            ]);
            $this->crud->addField([
                'name' => 'date',
                'label' => 'Дата',
                'type' => 'date',
                'default' => date('Y-m-d'),
            ]);
            $this->crud->addField( [   // repeatable
                'name'  => 'content',
                'label' => 'Контент',
                'type'  => 'repeatable',
                'subfields' => [ // also works as: "fields"
                    [
                        'name'    => 'title',
                        'type'    => 'text',
                        'label'   => 'Заголовок',
                        'wrapper' => ['class' => 'form-group col-md-4'],
                    ],
                    [
                        'name'  => 'content',
                        'type'  => 'ckeditor',
                        'label' => 'Содержимое',
                    ],
                    [   // Browse multiple
                        'name'          => 'image',
                        'label'         => 'Картинка',
                        'type'          => 'browse',
                        // 'multiple'   => true, // enable/disable the multiple selection functionality
                        // 'sortable'   => false, // enable/disable the reordering with drag&drop
                    ],
                ],

            ]);
            $this->crud->addField([
                'name' => 'image',
                'label' => 'Превью',
                'type' => 'browse',
            ]);
            $this->crud->addField([
                'label' => 'Теги',
                'type' => 'relationship',
                'name' => 'tags', // the method that defines the relationship in your Model
                'entity' => 'tags', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
//                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
//                'inline_create' => ['entity' => 'tag'],
//                'ajax' => true,
            ]);
            $this->crud->addField([
                'label' => 'Продукт',
                'type' => 'relationship',
                'name' => 'product', // the method that defines the relationship in your Model
                'entity' => 'product', // the method that defines the relationship in your Model
                'attribute' => 'name', // foreign key attribute that is shown to user
//                'pivot' => true, // on create&update, do you need to add/delete pivot table entries?
//                'inline_create' => ['entity' => 'tag'],
//                'ajax' => true,
            ]);
            $this->crud->addField([
                'name' => 'status',
                'label' => 'Статус',
                'type' => 'select_from_array',
                'options' => [
                    'Опубликован' => 'Опубликован',
                    'Черновик' => 'Черновик',
                ],
            ]);
            $this->crud->addField([
                'name' => 'featured',
                'label' => 'Featured item',
                'type' => 'checkbox',
            ]);
        });
    }



    /**
     * Respond to AJAX calls from the select2 with entries from the Tag model.
     *
     * @return JSON
     */
    public function fetchTags()
    {
        return $this->fetch(App\Models\Tag::class);
    }
}
