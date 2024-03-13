<template>
  <div class="container">
    <h1 class="genero" style="text-align: center;">Libros por Género</h1>

    <div v-for="(librosPorGenero, genero) in librosPorGenero" :key="genero" class="genero">
      <h2>{{ genero }}</h2>
      <table>
        <thead>
          <tr>
            <th class="titulo-columna">Título</th>
            <th class="autor-columna">Autor</th>
            <th class="fecha-columna">Fecha de publicación</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="libro in librosPorGenero" :key="libro.id">
            <td class="titulo-columna">{{ libro.titulo }}</td>
            <td class="autor-columna">{{ libro.autor }}</td>
            <td class="fecha-columna">{{ libro.fecha_publicacion }}</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      libros: [],
    };
  },
  computed: {
    librosPorGenero() {
      const librosPorGenero = {};
      this.libros.forEach(libro => {
        if (!librosPorGenero[libro.genero]) {
          librosPorGenero[libro.genero] = [];
        }
        librosPorGenero[libro.genero].push(libro);
      });
      return librosPorGenero;
    }
  },
  methods: {
    async fetchLibros() {
      try {
        const response = await axios.get('/libros/Organize');
        this.libros = response.data.libros;
      } catch (error) {
        console.error(error);
      }
    }
  },
  created() {
    this.fetchLibros();
  },
};
</script>

<style scoped>
.container {
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
}

h1 {
  margin-bottom: 20px;
  color: white;
}

h2 {
  margin-top: 20px;
  color: white;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th,td {
  padding: 10px;
  border-bottom: 1px solid #ddd;
  text-align: left;
  color: white;
}

th {
  background-color: #2c3e50;
}

th.titulo-columna {
  padding-right: 150px;
}

th.autor-columna {
  padding-right: 150px;
}

th.fecha-columna {
  padding-right: 150px;
}

.genero {
  margin-bottom: 20px;
  border-radius: 10px;
  background-color: rgba(0, 0, 0, 0.5);
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 1px 3px rgba(0, 0, 0, 0.08);
}

tr:hover {
  background-color: rgba(255, 255, 255, 0.1);
}
</style>
