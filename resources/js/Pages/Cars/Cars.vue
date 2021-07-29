<template>
  <div>
    <div class="w-full mb-16 flex justify-between">
      <h1 class="text-2xl">Cars</h1>
      <inertia-link href="/dashboard/cars" class="btn btn-primary">
        <p>Add Car</p>
      </inertia-link>
    </div>
    <table width="100%">
      <tr>
        <th>Year</th>
        <th>Brand</th>
        <th>License Plate</th>
        <th>Actions</th>
      </tr>
      <tr style="border: 1px solid #eaeaea" v-for="car in cars" :key="car.id">
        <td>
          <div class="my-3">
            {{ car.year }}
          </div>
        </td>
        <td>
          <div class="my-3">
            {{ car.brand }}
          </div>
        </td>
        <td>
          <div class="my-3">
            {{ car.license_plate }}
          </div>
        </td>
        <td>
          <div class="my-3 flex justify-center">
            <inertia-link href="/dashboard/cars" :data="{ id: car.id }">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="mr-5"
              >
                <title id="edit-car">Edit</title>

                <path
                  d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"
                ></path>
                <path
                  d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"
                ></path>
              </svg>
            </inertia-link>
            <button @click="deleteCar(car.id)">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <title id="delete-car">Delete</title>
                <polyline points="3 6 5 6 21 6"></polyline>
                <path
                  d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"
                ></path>
              </svg>
            </button>
          </div>
        </td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  props: {
    cars: Array,
  },
  methods: {
    deleteCar(id) {
      this.$inertia.delete("/dashboard/cars", {
        data: {
          id
        },
      });
    },
  },
};
</script>

<style>
</style>