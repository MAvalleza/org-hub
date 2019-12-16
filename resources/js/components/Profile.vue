<template lang="pug">
  form(@submit.prevent="submit")
    div.form-group
      label(for="name") Name
      input(type="text" name="name" id="name" v-model="fields.name").form-control
      div(v-if="errors && errors.name").text-danger {{ errors.name[0] }}
    div.form-group
      label(for="email") Abbreviation
      input(type="text" name="abbreviation" id="abbreviation" v-model="fields.abbreviation").form-control
      div(v-if="errors && errors.abbreviation").text-danger {{ errors.abbreviation[0] }}
    div.form-group
      label(for="description") Description
      textarea(rows="3" v-model="fields.description").form-control
      div(v-if="errors && errors.description").text-danger {{ errors.description[0] }}
    button(type="submit").btn.btn-primary Update
</template>

<script>
export default {
  props: {
    organization: Object
  },
  data() {
    return {
      fields: {},
      errors: {},
    };
  },
  mounted () {
    this.fields = this.organization;
    console.log('fields', this.fields);
  },
  methods: {
    async submit() {
      this.errors = {};
      try {
        await axios.post('/profile/update' + this.fields.id, {
          ...this.fields,
          _method: 'PUT'
        });
        window.location.href="/dashboard";
      } catch (e) {
        if (e.response.status === 422) {
          this.errors = e.response.data.errors || {};
        }
      }
    }
  }
};
</script>