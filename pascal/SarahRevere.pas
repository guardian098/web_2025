PROGRAM SarahRevere(INPUT, OUTPUT);
USES
  DOS;
BEGIN
  WRITELN;
  IF GETENV('QUERY_STRING') = 'lanters=1'
  THEN
    WRITELN('The British are coming by land')
  ELSE
    IF GETENV('QUERY_STRING') = 'lanters=2'
    THEN
      WRITELN('The British are coming by sea')
    ELSE
      WRITELN('The British not coming')
END.
