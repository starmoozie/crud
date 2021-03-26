``` bash

#Column
$this->crud->addColumn($single_array); // tambah single kolom pada table view
$this->crud->addColumns([$kolom_1, $kolom_2]);  // tambah multiple kolom pada table view
$this->crud->modifyColumn($column_name, $modif_array);
$this->crud->removeColumn('column_name'); // hapus kolom
$this->crud->removeColumns(['column_name_1', 'column_name_2']); // hapus multiple kolom

```