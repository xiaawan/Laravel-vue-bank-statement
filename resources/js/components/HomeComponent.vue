<template>
  <div>
	  <h1>Transactions</h1>
		<div class="row">
		  <div class="col-md-10"></div>
		  <div class="col-md-2">
			<router-link :to="{ name: 'create' }" class="btn btn-primary">New Transaction</router-link>
		  </div>
		</div><br />
		<table class="table table-hover">
			<thead>
			<tr>
				<th>Date</th>
				<th>Transaction</th>
				<th>Deposit</th>
				<th>Withdrawal</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
				<tr v-for="transaction in transactions" :key="transaction.id">
					<td>{{ transaction.created_at }}</td>
					<td>{{ transaction.description }}</td>
					<td><span class="text text-success" v-if="transaction.type == 'credit'">{{ transaction.amount }}</span></td>
					<td><span class="text text-danger" v-if="transaction.type == 'debit'">{{ transaction.amount }}</span></td>
					<td><router-link :to="{name: 'edit', params: { id: transaction.id }}" class="btn btn-primary">Edit</router-link>
					<button class="btn btn-danger" @click.prevent="deleteTransaction(transaction.id)">Delete</button></td>
				</tr>
			</tbody>
		</table>
  </div>
</template>

<script>
  export default {
	  data() {
		return {
		  transactions: []
		}
	  },
	  created() {
	  let uri = 'http://bank_statement.laravel/api/transactions';
	  this.axios.get(uri).then(response => {
		this.transactions = response.data.data;
	  });
	},
	methods: {
	  deleteTransaction(id)
	  {
		if (!confirm('Are you sure you want to delete this record?')) {
			return false;
		}
		let uri = `http://bank_statement.laravel/api/transactions/delete/${id}`;
		this.axios.delete(uri).then(response => {
			this.transactions = this.transactions.filter(transaction => transaction.id != id)
		});
	  }
	}
  }
</script>