<template>
  <div class="current-date-time">
    <h1>Fecha y Hora Actual</h1>
    <p>{{ currentDateTime }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentDateTime: ''
    };
  },
  mounted() {
    this.updateDateTime();
    setInterval(this.updateDateTime, 1000);
  },
  methods: {
    updateDateTime() {
      const now = new Date();
      const formattedDateTime = `${this.formatDate(now)} ${this.formatTime(now)}`;
      this.currentDateTime = formattedDateTime;
    },
    formatDate(date) {
      const options = { year: 'numeric', month: 'long', day: 'numeric' };
      return date.toLocaleDateString('es-ES', options);
    },
    formatTime(date) {
      const options = { hour: 'numeric', minute: 'numeric', second: 'numeric' };
      return date.toLocaleTimeString('es-ES', options);
    }
  }
};
</script>

<style scoped>
.current-date-time {
  text-align: center;
  margin-top: 50px;
  background: rgba(255, 255, 255, 0.8);
  flex: 1;
}

.current-date-time h1 {
  font-size: 24px;
}

.current-date-time p {
  font-size: 18px;
}
</style>
