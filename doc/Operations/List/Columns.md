## API Column

### Default column components
- array
- boolean
- date
- datetime
- image
- model_function
- number
- phone
- radio
- row_number
- text
- select
- select_from_array
- select_multiple
- table

``` bash

$this->crud->addColumn($single_array_column);
// Ex:
$this->crud->addColumn([
    'name'  => 'nama_db_kolom',
    'label' => 'Nama',
    'type'  => 'text'
]);

$this->crud->addColumns($multi_array_column);
// Ex:
$this->crud->addColumn([
    [
        'name'  => 'nama_db_kolom',
        'label' => 'Nama',
        'type'  => 'text'
    ],
        [
        'name'  => 'alamat_db_kolom',
        'label' => 'Alamat',
        'type'  => 'text'
    ]
]);

```

## Setup Columns

### array

Menampilkan array pada kolom yang disimpan sbg JSON
``` bash

[
   'name'  => 'options', // nama kolom
   'label' => 'Options', // Label pada header tabel
   'type'  => 'array'
],

```

### booelan

Menampilkan booelan status yes or no
``` bash

[
    'name'  => 'active',
    'label' => 'Active',
    'type'  => 'boolean',

    // Opsional menngganti yes / no
    // 'options' => [0 => 'Active', 1 => 'Inactive']
],

```

### date

Menampilkan date format
``` bash

[
    'name'  => 'date',
    'label' => 'Tanggal',
    'type'  => 'date',
    // Opsional
    // 'format' => 'l j F Y',
],

```

### datetime

Menampilkan datetime format
``` bash

[
    'name'  => 'date',
    'label' => 'Tanggal',
    'type'  => 'datetime',
    // Opsional
    // 'format' => 'l j F Y H:i:s',
],

```

### image

Menampilkan datetime format
``` bash

[
    'name'      => 'poto_profil',
    'label'     => 'Poto profil',
    'type'      => 'image',
    // Opsional, default 25px
    // 'height' => '30px',
    // 'width'  => '30px',
],

```

### model_function

Menampilkan kolom dari fungsi model
``` bash

[
   'name'  => 'url',
   'label' => 'URL',
   'type'  => 'model_function',
   'function_name' => 'getUrl', // method in Model
   // Opsional
   // 'limit' => 100, // Limit jumlah karakter
],

# Tambahkan dungsi pada model

public function getUrl() {
    return '<a href="'.url($this->url).'" target="_blank">'.$this->url.'</a>';
}

```

### select

Select realsi 1-N
``` bash

[
   'label'     => 'Categpry',
   'type'      => 'select',
   'name'      => 'category_id', // fk pada model child
   'entity'    => 'getCategory', // relasi pada model
   'attribute' => 'nama', // kolom yang ditampilkan pada category
   'model'     => "App\Models\Category",
],

```

### select_from_array

Select dari arraay, biasanya dari kolom enum
``` bash

[
    'name'    => 'status',
    'label'   => 'Status',
    'type'    => 'select_from_array',
    'options' => ['draft' => 'Draft (invisible)', 'published' => 'Published (visible)'],
],

```

### select_multiple

Select realsi N-N
``` bash

[
   'label'     => 'Role',
   'type'      => 'select_multiple',
   'name'      => 'getRole', // relasi pada model
   'entity'    => 'getRole', // relasi pada model
   'attribute' => 'nama', // kolom yang ditampilkan pada category
   'model'     => "App\Models\Role",
],

```

### table

Data dari json object
``` bash

[
    'name'  => 'nama', 
    'label' => 'Nama', 
    'type'  => 'table', 
    'columns' => [ // json column
        'tempat_lahir'  => 'Tempat Lahir',
        'tanggal_lahir' => 'Tanggal Lhir'
    ]
],

```

## Custom column HTML
Misal membuat markdown column dengan nama mardown.blade.php dan simpan ke resources/views/vendor/starmoozie/crud/columns

``` bash

<span>{!! \Markdown::convertToHtml($entry->{$column['details']}) !!}</span>

```

## Custom Search Logic pada search input

``` bash

# Contoh Pada column text
$this->crud->addColumn([
    'name'        => 'title',
    'label'       => 'Title',
    'searchLogic' => function ($query, $search) {
        $query->orWhere('title', 'like', '%'.$search.'%');
    }
]);

# COntoh pada column select
$this->crud->addColumn([
    'label'       => 'Category',
    'type'        => 'select',
    'name'        => 'category_id',
    'entity'      => 'get_category',
    'attribute'   => 'get_category_nama_created', // combine nama & created column
    'model'       => 'App\Models\Category',
    'searchLogic' => function ($query, $column, $searchTerm) {
        $query->orWhereHas('get_category', function ($q) use ($column, $search) {
            $q->where('nama', 'like', '%'.$search.'%')
              ->orWhereDate('created_at', '=', date($search));
        });
    }
]);

# disable pencarian pada kolom tertentu
$this->crud->addColumn([
    'name'        => 'title',
    'label'       => 'Title',
    'searchLogic' => false
]);

# dua kolom dengan name yang sama dengan menambah index "key"
$this->crud->addColumn([
   'label'     => 'Parent First Name',
   'type'      => 'select',
   'name'      => 'parent_id',
   'entity'    => 'parent',
   'attribute' => 'first_name',
   'model'     => 'App\Models\User',
]);

$this->crud->addColumn([
   'label'     => 'Parent Last Name',
   'type'      => 'select',
   'name'      => 'parent_id',
   'entity'    => 'parent',
   'attribute' => 'last_name',
   'model'     => 'App\Models\User',
   'key'       => 'parent_last_name',
]);

```