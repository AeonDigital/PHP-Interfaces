#
# Aeon Digital
# Rianna Cantarelli <rianna@aeondigital.com.br>
#
.SILENT:




#
# Dependências
include make/makeEnvironment.sh
include make/modules/database/Makefile
include make/modules/docker/Makefile
include make/modules/git/Makefile
include make/modules/tests/Makefile
