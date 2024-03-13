<template>
  <div class="act">
    <h1>Última actualización de libros:</h1>
    <p>{{ ultimaActualizacion }}</p>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      ultimaActualizacion: null
    };
  },
  mounted() {
    this.obtenerUltimaActualizacion();
  },
  methods: {
    obtenerUltimaActualizacion() {
      axios.get('/ultima-actualizacion')
        .then(response => {
          this.ultimaActualizacion = response.data.ultimaActualizacion;
        })
        .catch(error => {
          console.error('Error al obtener la última actualización:', error);
        });
    }
  }
};
</script>

<style scoped>
.act {
  text-align: center;
  margin-top: -16px;
  background: rgba(255, 255, 255, 0.8);
  flex: 1;
}

.act h1 {
  font-size: 24px;
}

.act p {
  font-size: 18px;
}
</style>