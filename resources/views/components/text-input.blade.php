@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'font-poppins text-[#413B36] bg-[#FAFAFA] border-[#413B36]/30 focus:border-[#927860] focus:ring-[#927860] rounded-md shadow-sm placeholder-[#413B36]/40']) }}>