<?php
namespace App\Controllers;

use App\Models\ProductoModel;

class Productos extends BaseController
{
    public function index()
    {
        $modelo = new ProductoModel();

        $datos['productos'] = $modelo->findAll();

        return view('productos', $datos);
    }

    public function guardar()
    {
        $modelo = new ProductoModel();

        $datos = $this->request->getPost(['nombre', 'precio']);

        if (! $this->validateData($datos, [
            'nombre' => 'required|max_length[100]',
            'precio' => 'required|numeric|greater_than_equal_to[0]',
        ])) {
            return redirect()->back()->with('error', 'Datos inválidos');
        }

        $modelo->insert($datos);

        return redirect()->to('/productos');
    }

    public function editar($id)
    {
        $modelo = new ProductoModel();
        $producto = $modelo->find($id);

        if (! $producto) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('editar_producto', ['producto' => $producto]);
    }

    public function actualizar($id)
    {
        $modelo = new ProductoModel();

        if (! $modelo->find($id)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $datos = $this->request->getPost(['nombre', 'precio']);

        if (! $this->validateData($datos, [
            'nombre' => 'required|max_length[100]',
            'precio' => 'required|numeric|greater_than_equal_to[0]',
        ])) {
            return redirect()->back()->with('error', 'Datos inválidos');
        }

        $modelo->update($id, $datos);

        return redirect()->to('/productos');
    }

    public function eliminar($id)
    {
        $modelo = new ProductoModel();

        $modelo->delete($id);

        return redirect()->to('/productos');
    }
}
