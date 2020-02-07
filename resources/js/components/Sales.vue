<template>
    <div>
        <form method="post" action="" autocomplete="off">


            <h6 class="heading-small text-muted mb-4">Property information</h6>
            <div class="pl-lg-4">
                <div class="form-group">
                    <label class="form-control-label" for="input-name">Customer</label>
                    <select>
                        <option>Customer 1</option>
                        <option>Customer 1</option>
                        <option>Customer 1</option>
                        <option>Customer 1</option>
                    </select>
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
