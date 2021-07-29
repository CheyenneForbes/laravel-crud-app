<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ car ? "Edit" : "Create" }} Car
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">
          <h1 class="text-2xl mb-10">{{ car ? "Edit" : "Create" }} Car</h1>
          <form @submit.prevent="submit">
            <div class="flex justify-between items-center mb-5">
              <p class="text-lg">Year</p>
              <input
                v-model="form.year"
                class="w-1/2"
                type="number"
                placeholder="2021"
                required
              />
            </div>
            <div class="flex justify-between items-center mb-5">
              <p class="text-lg">Brand</p>
              <input
                v-model="form.brand"
                class="w-1/2"
                type="text"
                placeholder="Toyota"
                required
              />
            </div>
            <div class="flex justify-between items-center mb-5">
              <p class="text-lg">License Plate</p>
              <input
                v-model="form.license_plate"
                class="w-1/2"
                type="text"
                placeholder="ASD23"
                required
              />
            </div>
            <button
              type="submit"
              class="btn btn-primary"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Create Car
            </button>
          </form>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: {
    car: {
      type: Object,
      required: false,
    },
  },
  data() {
    return {
      form: this.$inertia.form({
        year: "",
        brand: "",
        license_plate: "",
        id: ""
      }),
    };
  },
  mounted() {
    if (this.car) {
      this.form.year = this.car.year;
      this.form.license_plate = this.car.license_plate;
      this.form.brand = this.car.brand;
      this.form.id = this.car.id;
    }
  },
  methods: {
    submit() {
      this.form.post("/dashboard/cars");
    },
  },
};
</script>
