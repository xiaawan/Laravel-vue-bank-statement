<template>
	<div>
		<h1>Create A Post</h1>
		<form @submit.prevent="addTransaction">
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="type">Transaction Type:</label>
						<select id="type" name="type" class="form-control" v-model="transaction.type">
							<option value="debit">Debit</option>
							<option value="credit">Credit</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="amount">Amount:</label>
						<input id="amount" name="amount" class="form-control" v-model="transaction.amount" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>Description:</label>
						<textarea class="form-control" v-model="transaction.description" rows="5"></textarea>
					</div>
				</div>
			</div><br />
			<div class="form-group">
				<button class="btn btn-primary">Create</button>
				<router-link :to="{ name: 'home' }" class="btn btn-danger">Cancel</router-link>
			</div>
		</form>
	</div>
</template>

<script>
	export default {
		data(){
			return {
				transaction:{}
			}
		},
		methods: {
			addTransaction(){
				let uri = 'http://bank_statement.laravel/api/transactions/create';
				this.axios.post(uri, this.transaction).then((response) => {
					 this.$router.push({name: 'home'});
				});
			}
		}
	}
</script>