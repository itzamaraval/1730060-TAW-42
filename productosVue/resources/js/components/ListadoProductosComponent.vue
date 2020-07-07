<template>
  <div>
      <h1>Productos</h1>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-2">
            <router-link :to="{ name: 'crear' }" class="btn btn-primary">Registrar un Producto</router-link>
          </div>
        </div><br />

        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Listado</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>Nombre</th>
                        <th>Precio Venta</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="producto in productos" :key="producto.id">
                        
                        <td>{{ producto.nombre }}</td>
                        <td>{{ producto.precio_venta }}</td>
                        <td><router-link :to="{name: 'editar', params: { id: producto.id }}" class="btn btn-primary">Editar</router-link></td>
                        <td><button class="btn btn-danger" @click = "deletePost(producto.id)">Eliminar</button></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
  </div>
</template>

<script>
  export default {
      data() {
        return {
          productos: []
        }
      },
      created() {
      let uri = 'http://localhost:8000/api/productos';
      this.axios.get(uri).then(response => {
        this.productos = response.data.data;
      });
    },
    methods: {
      deletePost(id)
      {
        let uri = `http://localhost:8000/api/producto/eliminar/${id}`;
        this.axios.delete(uri).then(response => {
          this.productos.splice(this.productos.indexOf(id), 1);
        });
      }
    }
  }
</script>
