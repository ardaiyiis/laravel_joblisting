<x-layout>
    <x-page-heading>Create Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input label="Title" name="title" placeholder="Dentist" />
        <x-forms.input label="Salary" name="salary" placeholder="68,000 USD " />
        <x-forms.input label="Location" name="location" placeholder="Moscow/Russia" />
        
        <x-forms.select label="Schedule" name="schedule" >
            <option>Full Time</option>
            <option>Part Time</option>
        </x-forms.select>

        <x-forms.checkbox label="Feature (Costs Extra)" name="featured" />


        
        <x-forms.input label="Url" name="url" placeholder="www.dentasel.com/career/12321421" />

        <x-forms.divider />

        <x-forms.input label="Tags (comma seperated)" name="tags" placeholder="health, specialist, operation" />

        
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>