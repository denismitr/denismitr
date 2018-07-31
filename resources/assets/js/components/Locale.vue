<template>
    <div class="inline-block w-16 relative">
        <select class="block w-full appearance-none bg-grey-lighter rounded border border-grey-light hover:border-grey px-2 leading-tight" @change="onChange">
            <option :selected="locale === 'ru'">ru</option>
            <option :selected="locale === 'en'">en</option>
        </select>
        <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'locale',

        methods: {
            onChange (e) {
                const uri = e.target.value === 'ru' ? 
                    '/locale/russian/change' : 
                    '/locale/english/change';

                window.axios.post(uri).then(() => {
                    document.location.reload();
                }).catch(error => {
                    console.log(e.target.value);
                });    
            }
        },

        props: {
            locale: {
                type: String,
                required: true,
            }
        }
    }
</script>
