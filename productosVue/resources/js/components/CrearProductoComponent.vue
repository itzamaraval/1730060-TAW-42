<template>
  <div>
    <h1>Registrar un Producto</h1>
    <form @submit.prevent="addPost">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Nombre:</label>
            <input type="text" class="form-control" v-model="producto.nombre">
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Descipción:</label>
              <textarea class="form-control" v-model="producto.descripcion" rows="3"></textarea>
            </div>
          </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Cantidad:</label>
            <input type="number" min="0" class="form-control" v-model="producto.cantidad">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Precio Venta:</label>
            <input type="number" class="form-control" v-model="producto.precio_venta">
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Precio Compra:</label>
            <input type="number" class="form-control" v-model="producto.precio_compra">
          </div>
        </div>
      </div>
      <br />

      <div class="form-group">
        <button class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          producto:{}
        }
    },
    methods: {
      addPost(){
        let uri = 'http://localhost:8000/api/producto/crear';
        this.axios.post(uri, this.producto).then((response) => {
          this.$router.push({name: 'productos'});
        });
      }
    }
  }
</script>
