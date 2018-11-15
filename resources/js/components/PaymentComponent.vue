<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Payment Information</div>

                    <div class="card-body">
                      <card class='stripe-card'
                       :class='{ complete }'
                       stripe='pk_test_vOqDwDXTRiUp8s6NODjI1R1z'
                       :options='stripeOptions'
                       @change='complete = $event.complete'
                     />
                     <v-btn color="error" @click='pay' :disabled='!complete'>Update Card Information</v-btn>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Card, createToken } from 'vue-stripe-elements-plus'

export default {
  data () {
    return {
      complete: false,
      stripeOptions: {
        // see https://stripe.com/docs/stripe.js#element-options for details
      }
    }
  },

  components: { Card },

  methods: {
    pay () {
      // createToken returns a Promise which resolves in a result object with
      // either a token or an error key.
      // See https://stripe.com/docs/api#tokens for the token object.
      // See https://stripe.com/docs/api#errors for the error object.
      // More general https://stripe.com/docs/stripe.js#stripe-create-token.
      createToken().then(data => console.log(data.token))
    }
  }
}
</script>

<style>
.stripe-card {
  width: 300px;
  border: 1px solid grey;
}
.stripe-card.complete {
  border-color: green;
}
</style>
