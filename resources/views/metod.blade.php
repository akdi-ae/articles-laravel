
@extends('layouts.app')
@section('content')
  <main class="max-w-4xl mx-auto mt-28 px-6">
    <h1 class="text-2xl font-bold text-center mb-6">
      Қолжазбаны рәсімдеуге қойылатын талаптар
    </h1>

    <div class="rounded-xl bg-white shadow-md p-6">
      <h2 class="text-lg font-semibold text-center mb-4">Негізгі</h2>
      <p class="mb-3">
        1. Қазақ, орыс және ағылшын тілдеріндегі қолжазбалар МС 7.5-98 "Журналдар, жинақтар, ақпараттық басылымдар. Жарияланатын материалдарды баспалық рәсімдеу" бойынша рәсімделуі керек.
      </p>
      <p class="mb-3">
        2. Қолжазбалар электрондық түрде Word А4 редакторында ұсынылады: жиектері - жоғары және төменгі - 2см, сол жағы - 3 см, оң жағы - 1,5 см, шрифті Times New Roman, кегль 11, интервалы 1.
      </p>
      <p>
        Журнал редакциясы қазақ, орыс және ағылшын тілдерінде қолжазбаларды баспалық рәсімдеудің келесі құрылымын ұсынады:
      </p>
    </div>


    <div class="mt-10 overflow-x-auto">
      <table class="w-full border border-gray-300 rounded-lg shadow-sm">
        <thead class="bg-gray-100 text-gray-800">
          <tr>
            <th class="border px-4 py-2 text-left">№</th>
            <th class="border px-4 py-2 text-left">Қолжазба элементтері</th>
            <th class="border px-4 py-2 text-left">Қарпі</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2">1</td>
            <td class="px-4 py-2">Журналдың логотипі (редакциямен енгізіледі) / Айдар</td>
            <td class="px-4 py-2">Кегль 14, бас, қалың қаріп</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2">2</td>
            <td class="px-4 py-2">ҒТАМР коды (ғылыми-техникалық ақпараттың мемлекетаралық рубрикаторы)</td>
            <td class="px-4 py-2">Кегль 14, бас, кәдімгі қаріп</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2">3</td>
            <td class="px-4 py-2">Мақаланың атауы (12 сөзден артық емес)</td>
            <td class="px-4 py-2">Кегль 14, бас, қалың қаріп</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2">4</td>
            <td class="px-4 py-2">Авторлардың аты-жөні (4 автордан артық емес, байланыс жасаушы автор *)</td>
            <td class="px-4 py-2">Кегль 12, бас, қалың қаріп</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-2">5</td>
            <td class="px-4 py-2">Байланыс жасаушы автор үшін мекен-жай деректері, ұйымның атауы, поштасы</td>
            <td class="px-4 py-2">Кегль 11, бас, қалың қаріп</td>
          </tr>
        </tbody>
      </table>
    </div>
  </main>
@endsection
