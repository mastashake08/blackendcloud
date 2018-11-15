<template>
    <div  class="container">
        <div v-if="!user.subscribed" class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Payment Information</div>

                    <div class="card-body">
                      <card class='stripe-card form-control'
                       :class='{ complete }'
                       stripe='pk_live_REpu4rz1eQsuOgZuxukmRxbX'
                       :options='stripeOptions'
                       @change='complete = $event.complete'
                     />
                     <br>
                     <button class="btn btn-success" @click='pay' :disabled='!complete'>Update Card Information</button>
                    </div>
                </div>
            </div>
        </div>
        <div v-else class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Access Your Backend</div>

                    <div class="card-body">
                      Access your backend <a href="https://box.jyroneparkeremail.space/cloud">here</a>

                      </div>
                </div>
            </div>
            <br>
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Payment Information</div>

                    <div class="card-body">
                      Current card ending in {{user.last4}}
                      <card class='stripe-card form-control'
                       :class='{ complete }'
                       stripe='pk_test_vOqDwDXTRiUp8s6NODjI1R1z'
                       :options='stripeOptions'
                       @change='complete = $event.complete'
                     />
                     <br>
                     <button class="btn btn-success" @click='update' :disabled='!complete'>Update Card Information</button>
                     <button class="btn btn-danger" @click="stopSubscription">Stop Subscription</button>

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
      user: {},
      complete: false,
      stripeOptions: {
        // see https://stripe.com/docs/stripe.js#element-options for details
      }
    }
  },
  created(){
    var that = this;
    axios.get('/api/user').then((res) => {
      that.user = res.data;
    })
  },

  components: { Card },

  methods: {
    pay () {
      var that = this;
      // createToken returns a Promise which resolves in a result object with
      // either a token or an error key.
      // See https://stripe.com/docs/api#tokens for the token object.
      // See https://stripe.com/docs/api#errors for the error object.
      // More general https://stripe.com/docs/stripe.js#stripe-create-token.
      createToken().then(data =>

        axios.post('/api/subscription',{stripeToken:data.token.id}).then((res) => {
          alert('Payment method updated!');
          that.user = res.data;
        })

      )
    },
    update () {
      var that = this;
      // createToken returns a Promise which resolves in a result object with
      // either a token or an error key.
      // See https://stripe.com/docs/api#tokens for the token object.
      // See https://stripe.com/docs/api#errors for the error object.
      // More general https://stripe.com/docs/stripe.js#stripe-create-token.
      createToken().then(data =>

        axios.post('/api/subscription/update',{stripeToken:data.token.id}).then((res) => {
          alert('Payment method updated!');
          that.user = res.data;
        })

      )
    },
    stopSubscription(){
      var that = this;
      var con = confirm('Are you sure? Your data will be deleted after 90 days.')
      if(con){
      axios.post('/api/subscription/stop').then((res) => {
        that.user = res.data;
        alert('Subscription cancelled!');
      });
    }
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
