export type Translations = Record<string, string>;

export function createI18n(messages: Translations, locale: string) {
    const rtlLocales = new Set(['fa']);
    const isRtl = rtlLocales.has(locale);

    const t = (key: string, fallback?: string) => messages[key] ?? fallback ?? key;

    return { t, locale, isRtl };
}


